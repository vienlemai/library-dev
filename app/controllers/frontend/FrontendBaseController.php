<?php

class FrontendBaseController extends BaseController {
    protected $currentReader;

    public function __construct() {
        parent::__construct();
        if (Auth::check()) {
            $this->currentReader = Auth::user()->loginable;
        }
        $this->beforeFilter(function() {
                if (Auth::check()) {
                    View::share('books_in_cart', Session::get('books_in_cart', array()));
                }
            });
    }

    protected function booksInCart() {
        return Session::get('books_in_cart', array());
    }

}
