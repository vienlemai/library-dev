<?php

class FrontendBaseController extends BaseController {
    protected $currentReader;

    public function __construct() {
        parent::__construct();
        $this->beforeFilter(function() {
            if (Auth::check()) {
                View::share('books_in_cart', Session::get('books_in_cart', array()));
                if (!Session::has('curentReader')) {
                    Session::put('curentReader', Auth::user()->loginable);
                }
            }
        });
    }

    protected function booksInCart() {
        return Session::get('books_in_cart', array());
    }

}
