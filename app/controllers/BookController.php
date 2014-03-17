<?php

class BookController extends \BaseController {
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
		//
	}

	/**
	 * Display a listing of books that being catalog
	 */
	public function catalog() {
		$this->layout->content = View::make('book.catalog');
	}

	/**
	 * Add new book
	 *
	 * @return Response
	 */
	public function create() {
		$this->layout->content = View::make('book.create');
	}

	/**
	 * Validate book data from from, if pass then save data to database
	 */
	public function save() {
		$v = Book::validate(Input::all());
		if ($v->passes()) {
			$book = new Book(array(
				'title' => Input::get('title'),
				'sub_title' => Input::get('sub_title'),
				'author' => Input::get('author'),
				'translator' => Input::get('translator'),
				'publish_info' => Input::get('publish_info'),
				'publisher' => Input::get('publisher'),
				'printer' => Input::get('printer'),
				'pages' => Input::get('pages'),
				'size' => Input::get('size'),
				'attach' => Input::get('attach'),
				'organization' => Input::get('organization'),
				'language' => Input::get('language'),
				'cutter' => Input::get('cutter'),
				'type_number' => Input::get('type_number'),
				'price' => Input::get('price'),
				'storage' => Input::get('storage'),
				'number' => Input::get('number'),
				'level' => Input::get('level'),
				'another_infor' => Input::get('another_infor'),
			));
			$book->save();
			return Redirect::to('/book/' . $book->id . '/print-barcode');
		} else {
			Former::withErrors($v->messages());
			return View::make('book.create');
		}
	}

	public function printBarcode($bookId) {
		$book = Book::findOrFail($bookId);
		$user = Sentry::getUser();
		if ($book->created_by != $user->id) {
			App::abort(404);
		}
		$this->layout->content = View::make('book.print_barcode', array('book' => $book));
	}

	/**
	 * Gennerate barcode
	 */
	public function generateBarcode() {
		$number = Input::get('number');
		$prefix = time();
		$result = array();
		for ($i = 1; $i <= $number; $i++) {
			array_push($result, array('code' => $prefix . sprintf("%03s", $i), 'barcode' => DNS1D::getBarcodeHTML($prefix . $i, "UPCA")));
		}
		return View::make('book.generate-barcode', array('barcode' => $result));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
