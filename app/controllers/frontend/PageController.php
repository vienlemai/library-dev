<?php

class PageController extends FrontendBaseController {

    public function index() {
        if (Auth::check()) {
            if (Auth::user()->loginable_type != 'Reader') {
                Auth::logout();
            }
        }
        $books = Book::level(array(2, 3, 4))
            ->publish()
            ->orderBy('published_at', 'DESC');
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
