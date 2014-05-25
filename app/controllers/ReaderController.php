<?php

class ReaderController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $readers = Reader::orderBy('created_at', 'desc')->paginate(self::ITEMS_PER_PAGE);
        if (Request::ajax()) {
            return View::make('reader.partials.index', array('readers' => $readers));
        } else {
            foreach (Reader::$LABELS as $k => $v) {
                $count[$k] = Reader::where('status', '=', $k)->count();
            }
            return View::make('reader.index', array('count' => $count, 'readers' => $readers));
        }
    }

    public function search() {
        $keyword = Input::get('keyword');
        $readers = Reader::where('full_name', 'LIKE', '%' . $keyword . '%')->paginate(self::ITEMS_PER_PAGE);
        if (Request::ajax()) {
            return View::make('reader.partials.index', array('readers' => $readers, 'keyword' => $keyword));
        } else {
            foreach (Reader::$LABELS as $k => $v) {
                $count[$k] = Reader::where('status', '=', $k)->count();
            }
            return View::make('reader.index', array('count' => $count, 'readers' => $readers));
        }
    }

    public function create($type) {
        return View::make('reader.create', array('type' => $type));
    }

    public function save($type) {
        if ($type == Reader::TYPE_STUDENT) {
            $v = Reader::studentValidate(Input::all());
        } else {
            $v = Reader::teacherValidate(Input::all());
        }
        if ($v->passes()) {
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 9);
            $fullCode = Book::ean13_check_digit($random);
            $reader = new Reader(Input::all());
            $reader->reader_type = $type;
            $reader->barcode = $fullCode;
            $account = new Account(array(
                'username' => $reader->email,
                'password' => Hash::make('123456')
            ));
            if ($reader->save()) {
                $reader->account()->save($account);
                Session::flash('success', 'Tạo mới thành công bạn đọc ' . $reader->full_name);
                return Redirect::route('readers');
            } else {
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
                return Redirect::route('reader.create');
            }
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function view($id) {
        $reader = Reader::with('creator')->find($id);
        return View::make('reader.view', array('reader' => $reader));
    }

    public function card($id) {
        $reader = Reader::findOrFail($id);
        $barcode = DNS1D::getBarcodePNGPath($reader->barcode, "EAN13", 1.5, 33);
        return View::make('reader.card', array('reader' => $reader, 'barcode' => $barcode));
    }

    public function pause($id) {
        $reader = Reader::findOrFail($id);
        Reader::where('id', '=', $id)->update(array('status' => Reader::SS_PAUSED));
        Session::flash('success', 'Đã khóa bạn đọc ' . $reader->full_name);
        return Redirect::route('reader.view', array($reader->id));
    }

    public function unpause($id) {
        $reader = Reader::findOrFail($id);
        Reader::where('id', '=', $id)->update(array('status' => Reader::SS_CIRCULATED));
        Session::flash('success', 'Đã mở khóa cho bạn đọc ' . $reader->full_name);
        return Redirect::route('reader.view', array($reader->id));
    }

    public function history($id) {
        $reader = Reader::findOrFail($id);
        $circulations = Circulation::where('reader_id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return View::make('reader.partials.history', array('reader' => $reader, 'circulations' => $circulations));
    }

    public function edit($id) {
        $reader = Reader::findOrFail($id);
        return View::make('reader.edit', array('reader' => $reader));
    }

    public function update($id) {
        $reader = Reader::findOrFail($id);
        if ($reader->isStudent()) {
            $v = Reader::studentValidate(Input::all());
        } else {
            $v = Reader::teacherValidate(Input::all());
        }
        if ($v->passes()) {
            $reader->update(Input::all());
            Session::flash('success', 'Lưu thành công thông tin bạn đọc "' . $reader->full_name . '"');
        } else {
            return Redirect::route('reader.create')->withInput()->withErrors($v->messages());
        }
        return Redirect::route('readers');
    }

}
