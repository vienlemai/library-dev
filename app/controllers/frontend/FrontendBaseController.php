<?php

class FrontendBaseController extends BaseController {

    public function __construct() {
        parent::__construct();
//        if (Auth::check()) {
            $books_in_cart = Session::get('books_in_cart', array());
            View::share('books_in_cart', $books_in_cart);
//        }
    }

}
