<?php

class PageController extends FrontendBaseController {

    public function index() {
        $books = Book::level(array(2, 3, 4));
        return View::make('frontend.page.index', array('books' => $books->paginate(20)));
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
