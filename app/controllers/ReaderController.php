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
            $reader = new Reader(Input::all());
            if (!$reader->checkExistEmail()) {
                $mailSubject = 'Thông báo về việc tạo mới tài khoản thư viện';
                try {
                    $password = '123456';
//                    Mail::send('reader.partials.mail_template', array(
//                        'reader' => $reader,
//                        'password' => $password), function($message) use ($reader, $mailSubject) {
//                        $message->to($reader->email, $reader->full_name)->subject($mailSubject);
//                    });
                    $reader->reader_type = $type;
                    $account = new Account(array(
                        'username' => $reader->email,
                        'password' => Hash::make($password)
                    ));
                    $expired = $this->configs['reader_expired'];
                    $reader->expired_at = Carbon\Carbon::now()->addDays($expired);
                    $reader->save();
                    $reader->account()->save($account);
                    $reader->saveCardNumber();
                    Session::flash('success', 'Tạo mới thành công bạn đọc ' . $reader->full_name);
                    return Redirect::route('readers');
                } catch (Exception $exc) {
                    Session::flash('error', 'Tạo bạn đọc thất bại, không có kết nối đến Internet nên không thể gửi mail, vui lòng kiểm tra lại kết nối.');
                    return Redirect::back();
                }
                //$this->addMailToQueue($reader->email, $mailSubject, $mailContent);
            } else {
                Session::flash('error', 'Email này đã tồn tại, không thể tạo mới');
                return Redirect::back();
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
        $barcode = DNS1D::getBarcodePNGPath($reader->barcode, "EAN13", 2.0, 50);
        return View::make('reader.card', array('reader' => $reader, 'barcode' => $barcode));
    }

    public function cards() {
        $readers = Reader::whereIn('id', Input::get('readerId'))
            ->get();
        $barcodes = array();
        foreach ($readers as $r) {
            $barcode = DNS1D::getBarcodePNGPath($r->barcode, "EAN13", 1.5, 33);
            array_push($barcodes, $barcode);
        }
        return View::make('reader.cards', array(
                'readers' => $readers,
                'barcodes' => $barcodes,
        ));
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
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
        return Redirect::back();
    }

}
