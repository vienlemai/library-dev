<?php

class SearchController extends FrontendBaseController {
    protected $searchParams = array('type', 'keyword', 'storage');

    public function index() {
        $query = Book::search($this->sanitizedParams())
            ->level(array(3, 4))
            ->publish()
            ->orderBy('published_at', 'DESC');
        if (Auth::check()) {
            $query->permission(Auth::user()->loginable->reader_type);
        }
        $books = $query->paginate();
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
