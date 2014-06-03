<?php

class ArticleController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $articles = Article::with('creator')
            ->orderBy('created_at', 'DESC')
            ->paginate(self::ITEMS_PER_PAGE);
        return View::make('article.index', array('articles' => $articles));
    }

    public function create() {
        return View::make('article.create');
    }

    public function store() {
        $v = Article::validate(Input::only(array('title', 'content')));
        if ($v->passes()) {
            $article = new Article(Input::all());
            $article->save();
            Session::flash('success', 'Lưu thành công 1 thông báo');
            return Redirect::route('articles');
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function search() {
        $keyword = Input::get('keyword');
        $articles = Article::with('creator')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(self::ITEMS_PER_PAGE);
        return View::make('article.partials._list', array('articles' => $articles, 'keyword' => $keyword));
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        return View::make('article.edit', array('article' => $article));
    }

    public function update($id) {
        $v = Article::validate(Input::only(array('title', 'content')));
        if ($v->passes()) {
            $article = Article::findOrFail($id);
            $article->update(Input::all());
            Session::flash('success', 'Chỉnh sửa thành công 1 thông báo');
            return Redirect::route('articles');
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function delete($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        Session::flash('success', 'Xóa thành công 1 thông báo');
        return Redirect::route('articles');
    }

    public function active($id) {
        $article = Article::findOrFail($id);
        $article->makeActive();
        Session::flash('success', 'Kích hoạt thành công 1 thông báo');
        return Redirect::route('articles');
    }

    public function unActive($id) {
        $article = Article::findOrFail($id);
        $article->makeInactive();
        Session::flash('success', 'Ẩn thành công 1 thông báo');
        return Redirect::route('articles');
    }

}
