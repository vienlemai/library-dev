<?php

class PageController extends FrontendBaseController {

    public function index() {
        //$reader = Reader::find(Auth::user()->loginable_id);
        $books = Book::level(array(2, 3, 4))
            ->paginate(3);
        return View::make('frontend.page.index', array('books' => $books));
    }

    public function login() {
        return View::make('frontend.page.login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('fe.home');
    }

    private function sanitizedParams() {
        return Input::all();
    }

}
