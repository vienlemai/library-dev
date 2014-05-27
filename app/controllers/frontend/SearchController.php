<?php

class SearchController extends FrontendBaseController {
    protected $searchParams = array('type', 'keyword');

    public function index() {
        $books = Book::search(
                array_merge($this->sanitizedParams(), array('reader_type' => Session::get('curentReader')->reader_type))
            )->paginate(10);
        return View::make('frontend.search.index')
                ->with('keyword', Input::get('keyword', ''))
                ->with('books', $books);
    }

    protected function sanitizedParams() {
        return Input::only($this->searchParams);
    }

}
