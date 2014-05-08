<?php

class PageController extends FrontendBaseController {

    public function index() {
        return View::make('frontend.page.index');
    }

}