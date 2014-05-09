<?php

class PageController extends FrontendBaseController {

    public function index() {
        return View::make('frontend.page.index');
    }

    public function search() {
         return View::make('frontend.page.search');
    }

}