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
            ->orderBy('published_at', 'DESC')
            ->paginate(15);
        
        $newest_books = Book::newest();
        
        $top_books = Book::topBorrowing();
        
        return View::make('frontend.page.index')
                ->with(compact('newest_books','top_books','books'));
    }

    public function login() {
        return View::make('frontend.page.login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('fe.home');
    }

}
