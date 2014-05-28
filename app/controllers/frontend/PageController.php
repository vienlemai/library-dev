<?php

class PageController extends FrontendBaseController {

    public function index() {
        //$reader = Reader::find(Auth::user()->loginable_id);
        $books = Book::paginate(20);
        return View::make('frontend.page.index', array('books' => $books));
    }

    public function login() {
        return View::make('frontend.page.login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('fe.login');
    }

    private function sanitizedParams() {
        return Input::all();
    }

}
