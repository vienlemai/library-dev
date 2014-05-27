<?php

class CartController extends FrontendBaseController {

    public function show() {
        if (count($this->booksInCart()) > 0) {
            $books = Book::whereIn('id', $this->booksInCart())->get();
        } else {
            $books = array();
        }
        return View::make('frontend.cart.show')
                ->with('books', $books);
    }

    public function remove($book_id) {
        $books_in_cart = $this->booksInCart();
        if (Book::find($book_id) && in_array($book_id, $books_in_cart)) {
            $key = array_search($book_id, $books_in_cart);
            unset($books_in_cart[$key]);
            Session::put('books_in_cart', $books_in_cart);
            return Redirect::back();
        } else {
            App::abort(404);
        }
    }

    public function add() {
        $book_id = Input::get('book_id');
        $books_in_cart = $this->booksInCart();
        if (Book::find($book_id)) {
            $success = true;
            array_push($books_in_cart, $book_id);
            Session::put('books_in_cart', $books_in_cart);
        } else {
            $success = false;
        }
        return Response::json(array(
                'success' => $success,
                'books_count' => count($this->booksInCart())
        ));
    }

    public function clear() {
        Session::put('books_in_cart', array());
        return Response::to(route('fe.home'))->with('message', 'Đã làm trống giỏ sách!');
    }

}
