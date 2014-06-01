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
        if (Session::has('storage_html')) {
            $storage_html = Session::get('storage_html');
        } else {
            $storage = new Storage();
            $storage_html = $storage->renderList();
            Session::put('storage_html', $storage_html);
        }
        View::share('storage_html', $storage_html);
        View::share('slide_images', Slider::scanImages());
    }

    protected function booksInCart() {
        return Session::get('books_in_cart', array());
    }

}
