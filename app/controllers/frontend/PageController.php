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
        $articles = Article::recent(3)->get();

        return View::make('frontend.page.index')
                        ->with(compact('newest_books', 'top_books', 'books', 'articles'));
    }

    public function articles() {
         $articles = Article::active()
                 ->paginate(10);
           return View::make('frontend.page.articles')
                        ->with(compact('articles'));
    }

    public function articleDetails($id) {
        $article = Article::active()->find($id);
         return View::make('frontend.page.article_details')
                        ->with(compact('article'));
    }
    
    public function login() {
        return View::make('frontend.page.login');
    }

    public function logout() {
        Auth::logout();
        return Redirect::route('fe.home');
    }

}
