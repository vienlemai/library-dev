<?php

class FrontendBaseController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->beforeFilter(function() {
                // if (Auth::check()) {
                View::share('books_in_cart', $this->booksInCart());
                // }
            });
    }

    protected function booksInCart() {
        return Session::get('books_in_cart', array());
    }

}
