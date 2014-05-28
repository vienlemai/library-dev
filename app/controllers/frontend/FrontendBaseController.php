<?php

class FrontendBaseController extends BaseController {
    protected $currentReader;

    public function __construct() {
        parent::__construct();
        if (Auth::check()) {
            $this->currentReader = Auth::user()->loginable;
            View::share('currentReader', $this->currentReader);
            View::share('books_in_cart', $this->booksInCart());
        }
        $configs = DB::table('configs')
            ->get();
        foreach ($configs as $config) {
            View::share($config->key, $config->value);
        }
    }

    protected function booksInCart() {
        return Session::get('books_in_cart', array());
    }

}
