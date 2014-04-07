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
		foreach (Reader::$LABELS as $k => $v) {
			$count[$k] = Reader::where('status', '=', $k)->count();
		}
		$readers = Reader::paginate(self::ITEMS_PER_PAGE);
		$this->layout->content = View::make('reader.index', array('count' => $count, 'readers' => $readers));
	}

	public function create() {
		$this->layout->content = View::make('reader.create');
	}

	public function save() {
		$v = Reader::validate(Input::all());
		if ($v->passes()) {
			$time = time();
			$random = substr(number_format($time * rand(), 0, '', ''), 0, 6);
			$reader = new Reader(array(
				'barcode' => $random,
				'full_name' => Input::get('full_name'),
				'class' => Input::get('class'),
				'year_of_birth' => Input::get('year_of_birth'),
				'hometown' => Input::get('hometown'),
				'school_year' => Input::get('school_year'),
				'subject' => Input::get('subject'),
				'email' => Input::get('email'),
				'phone' => Input::get('phone'),
			));
			if ($reader->save()) {
				Session::flash('success', 'Tạo mới thành công bạn đọc ' . $reader->full_name);
				Redirect::route('reader');
			} else {
				Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
				Redirect::route('reader.create');
			}
		} else {
			Former::withErrors($v->messages());
			return Redirect::route('reader.create')->withInput()->withErrors($v->messages());
		}
	}

}
