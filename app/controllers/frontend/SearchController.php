<?php

class SearchController extends FrontendBaseController {
    protected $searchParams = array('type', 'keyword', 'storage');

    public function index() {
        $books = Book::search($this->sanitizedParams())
            ->level(array(2, 3, 4))
            ->paginate(20);
        $storages = Storage::all();
        return View::make('frontend.search.index')
                ->with('keyword', Input::get('keyword', ''))
                ->with('books', $books)
                ->with('storages', $storages);
    }

    protected function sanitizedParams() {
        return Input::only($this->searchParams);
    }

}
