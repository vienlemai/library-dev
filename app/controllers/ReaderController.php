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
        $readers = Reader::paginate(self::ITEMS_PER_PAGE);
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

    public function create() {
        $this->layout->content = View::make('reader.create');
    }

    public function save() {
        $v = Reader::validate(Input::all());
        if ($v->passes()) {
            $time = time();
            $vnCode = '893';
            $random = $vnCode . substr(number_format($time * mt_rand(), 0, '', ''), 0, 9);
            $fullCode = $this->ean13_check_digit($random);
            $reader = new Reader(array(
                'barcode' => $fullCode,
                'full_name' => Input::get('full_name'),
                'class' => Input::get('class'),
                'year_of_birth' => Input::get('year_of_birth'),
                'hometown' => Input::get('hometown'),
                'school_year' => Input::get('school_year'),
                'subject' => Input::get('subject'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'avatar' => Input::get('avatar')
            ));
            if ($reader->save()) {
                Session::flash('success', 'Tạo mới thành công bạn đọc ' . $reader->full_name);
                return Redirect::route('readers');
            } else {
                Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
                return Redirect::route('reader.create');
            }
        } else {
            Former::withErrors($v->messages());
            return Redirect::route('reader.create')->withInput()->withErrors($v->messages());
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

}
