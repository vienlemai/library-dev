<?php

namespace Frontend;

class PageController extends FrontendBaseController {
    public function index() {
        return \View::make('frontend.page.index');
    }

}