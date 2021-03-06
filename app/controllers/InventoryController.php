<?php

class InventoryController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $inventories = Inventory::with('creator')
            ->orderBy('status', 'ASC')
            ->orderBy('created_at', 'DESC')
            ->paginate(self::ITEMS_PER_PAGE);
        if (!Request::ajax()) {
            return View::make('inventory.index', array('inventories' => $inventories));
        } else {
            return View::make('inventory.index', array('inventories' => $inventories));
        }
    }

    public function create() {
        $inventoryDoing = Inventory::where('status', '=', Inventory::SS_DOING)->first();
        $doing = false;
        if (!empty($inventoryDoing)) {
            $doing = true;
        }
        return View::make('inventory.create', array('doing' => $doing));
    }

    public function save() {
        $v = Inventory::validate(Input::all());
        if ($v->passes()) {
            $inventory = new Inventory(array(
                'title' => Input::get('title'),
                'reason' => Input::get('reason'),
                'stored_list' => json_encode(DB::table('book_items')->where('status', BookItem::SS_STORAGED)->lists('id')),
                'lended_list' => json_encode(DB::table('book_items')->where('status', BookItem::SS_LENDED)->lists('id')),
            ));
            $inventory->save();
            return Redirect::route('inventory.execute', $inventory->id);
        } else {
            Former::withErrors($v->messages());
            return Redirect::route('inventory.create')->withInput()->withErrors($v->messages());
        }
    }

    public function execute($id) {
        $inventory = Inventory::find($id);
        $storages = Storage::where('parent_id', '=', null)->get();
        return View::make('inventory.execute', array('inventory' => $inventory, 'storages' => $storages));
    }

    public function getBookItem($inventoryId) {
        $barcode = Input::get('barcode');
        $storageId = Input::get('storage');
        $bookItem = BookItem::with('book')->where('barcode', '=', $barcode)->first();
        $result['status'] = true;
        if (!empty($bookItem)) {
            $check = DB::table(Inventory::DB_PREFIX . $inventoryId)
                    ->where('barcode', '=', $barcode)->first();
            if (empty($check)) {
                $storageModel = new Storage();
                $storage = $storageModel->find($storageId);
                if ($storageModel->isContain($storageId, $bookItem->book->storage)) {
                    DB::table(Inventory::DB_PREFIX . $inventoryId)
                        ->insert(array(
                            'book_item_id' => $bookItem->id,
                            'book_id' => $bookItem->book->id,
                            'barcode' => $bookItem->barcode,
                            'storage' => $bookItem->book->storage,
                    ));
                    Inventory::where('id', '=', $inventoryId)->increment('number_of_book');
                    $result['book_info'] = View::make('inventory.partials.book', array('bookItem' => $bookItem))->render();
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Tài liệu "' . $bookItem->book->title . '" không thuộc kho ' . $storage->name;
                }
            } else {
                $result['status'] = false;
                $result['message'] = 'Tài liệu này đã được quét, không thể quét lại';
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy tài liệu với mã "' . $barcode . '"';
        }

        return Response::json($result);
    }

    public function finish() {
        $inventoryId = Input::get('inventoryId');
        Inventory::findOrFail($inventoryId);
        Inventory::where('id', '=', $inventoryId)->update(array(
            'status' => Inventory::SS_FINISHED,
            'end_at' => Carbon\Carbon::now(),
        ));
        $storageModel = new Storage();
        $inventory = Inventory::findOrFail($inventoryId);
        $storages = Storage::where('parent_id', '=', null)
            ->get();
        $booksScanned = array();
        $booksScannedTotal = 0;
        for ($i = 0; $i < $storages->count(); $i++) {
            $nodeLeaves = array();
            $storageModel->getLeavesOfRoot($storages[$i]->id, $nodeLeaves);
            if (empty($nodeLeaves)) {
                array_push($nodeLeaves, $storages[$i]->id);
            }
            $number = DB::table(Inventory::DB_PREFIX . $inventoryId)
                ->whereIn('storage', $nodeLeaves)
                ->count();
            $booksScanned[$i]['count'] = $number;
            $booksScanned[$i]['id'] = $storages[$i]->id;
            $booksScanned[$i]['name'] = $storages[$i]->name;
            $booksScannedTotal += $number;
        }
        $storedList = json_decode($inventory->stored_list, true);
        $lendedList = json_decode($inventory->lended_list, true);
        $scannedList = DB::table(Inventory::DB_PREFIX . $inventoryId)
            ->lists('book_item_id');
        $bookTotal = count($storedList) + count($lendedList);
        $booksStored = count($storedList);
        $booksLended = count($lendedList);
        $bookLose = $bookTotal - $booksScannedTotal;
        $booksLendedList = null;
        if ($bookLose > 0) {
            $lost = array_diff(array_merge($storedList, $lendedList), $scannedList);
            $lostBooks = BookItem::with('book')->whereIn('id', $lost)
                ->get();
            DB::table('book_items')
                ->whereIn('id', $lostBooks->lists('id'))
                ->update(array('status' => BookItem::SS_LOST_BY_INVENTORY));
            foreach ($lostBooks as $bookItem) {
                DB::table('lost_books')
                    ->insert(array(
                        'reader_id' => '',
                        'book_item_id' => $bookItem->id,
                        'inventory_id' => $inventory->id,
                        'reason_id' => BookItem::SS_LOST_BY_INVENTORY,
                        'reason' => 'Mất kiểm kê (' . $inventory->title . ')',
                        'created_at' => Carbon\Carbon::now(),
                ));
                Book::where('id', $bookItem->book_id)->increment('lost');
            }
        }
        return Redirect::route('inventory.result', $inventoryId);
    }

    public function result($id) {
        $storageModel = new Storage();
        $inventory = Inventory::findOrFail($id);
        $storages = Storage::where('parent_id', '=', null)
            ->get();
        $booksScanned = array();
        $booksScannedTotal = 0;
        for ($i = 0; $i < $storages->count(); $i++) {
            $nodeLeaves = array();
            $storageModel->getLeavesOfRoot($storages[$i]->id, $nodeLeaves);
            if (empty($nodeLeaves)) {
                array_push($nodeLeaves, $storages[$i]->id);
            }
            $number = DB::table(Inventory::DB_PREFIX . $id)
                ->whereIn('storage', $nodeLeaves)
                ->count();
            $booksScanned[$i]['count'] = $number;
            $booksScanned[$i]['id'] = $storages[$i]->id;
            $booksScanned[$i]['name'] = $storages[$i]->name;
            $booksScannedTotal += $number;
        }
        $storedList = json_decode($inventory->stored_list, true);
        $lendedList = json_decode($inventory->lended_list, true);
        $scannedList = DB::table(Inventory::DB_PREFIX . $id)
            ->lists('book_item_id');
        $bookTotal = count($storedList) + count($lendedList);
        $booksStored = count($storedList);
        $booksLended = count($lendedList);
        $bookLose = $bookTotal - $booksScannedTotal;
        $booksLendedList = null;
        if ($bookLose > 0) {
            $lost = array_diff(array_merge($storedList, $lendedList), $scannedList);
            $lostBooks = BookItem::with('book')->whereIn('id', $lost)
                ->get();
        }
        return View::make('inventory.result', compact(
                    'id', 'bookTotal', 'booksStored', 'booksLended', 'booksScanned', 'inventory', 'booksScannedTotal', 'bookLose', 'booksLendedList', 'lostBooks'
                )
        );
    }

    public function printResult($id) {
        $storageModel = new Storage();
        $inventory = Inventory::findOrFail($id);
        $storages = Storage::where('parent_id', '=', null)
            ->get();
        $booksScanned = array();
        $booksScannedTotal = 0;
        for ($i = 0; $i < $storages->count(); $i++) {
            $nodeLeaves = array();
            $storageModel->getLeavesOfRoot($storages[$i]->id, $nodeLeaves);
            if (empty($nodeLeaves)) {
                array_push($nodeLeaves, $storages[$i]->id);
            }
            $number = DB::table(Inventory::DB_PREFIX . $id)
                ->whereIn('storage', $nodeLeaves)
                ->count();
            $booksScanned[$i]['count'] = $number;
            $booksScanned[$i]['id'] = $storages[$i]->id;
            $booksScanned[$i]['name'] = $storages[$i]->name;
            $booksScannedTotal += $number;
        }
        $storedList = json_decode($inventory->stored_list, true);
        $lendedList = json_decode($inventory->lended_list, true);
        $scannedList = DB::table(Inventory::DB_PREFIX . $id)
            ->lists('book_item_id');
        $bookTotal = count($storedList) + count($lendedList);
        $booksStored = count($storedList);
        $booksLended = count($lendedList);
        $bookLose = $bookTotal - $booksScannedTotal;
        $booksLendedList = null;
        if ($bookLose > 0) {
            $lost = array_diff(array_merge($storedList, $lendedList), $scannedList);
            $lostBooks = BookItem::with('book')->whereIn('id', $lost)
                ->get();
        }
        return View::make('inventory.print_result', compact(
                    'bookTotal', 'booksStored', 'booksLended', 'booksScanned', 'inventory', 'booksScannedTotal', 'bookLose', 'booksLendedList', 'lostBooksByReader', 'lostBooks'
                )
        );
    }

}
