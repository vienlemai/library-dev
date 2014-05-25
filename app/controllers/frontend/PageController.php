<?php

class PageController extends FrontendBaseController {

    public function index() {
        $reader = Reader::find(Auth::user()->loginable_id);
        $books = Book::ofReaderType($reader->reader_type)->get();
        return View::make('frontend.page.index', array('books' => $books));
    }

    public function search() {
        return View::make('frontend.page.search');
    }

    public function login() {
        return View::make('frontend.page.login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('fe.login');
    }

}
