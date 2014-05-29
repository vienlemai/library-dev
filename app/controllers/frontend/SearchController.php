<?php

class SearchController extends FrontendBaseController {
    protected $searchParams = array('type', 'keyword');

    public function index() {
        $books = Book::search($this->sanitizedParams())
            ->level(array(2, 3, 4))
            ->paginate(20);
        return View::make('frontend.search.index')
                ->with('keyword', Input::get('keyword', ''))
                ->with('books', $books);
    }

    protected function sanitizedParams() {
        return Input::only($this->searchParams);
    }

}
