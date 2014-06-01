<?php

class PageController extends FrontendBaseController {

    public function index() {
        $books = Book::level(array(2, 3, 4))
            ->publish()
            ->orderBy('published_at', 'DESC');
        $newest_books = Book::newest();
        $top_books = Book::topBorrowing();
        return View::make('frontend.page.index')
                ->with(compact('newest_books','top_books'))
                ->with('books',$books->paginate(20));
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
