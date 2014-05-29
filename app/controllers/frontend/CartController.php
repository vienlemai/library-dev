<?php

class CartController extends FrontendBaseController {

    public function show() {
        if (count($this->booksInCart()) > 0) {
            $books = Book::whereIn('id', $this->booksInCart())->get();
        } else {
            $books = array();
        }
        $readerId = Auth::user()->loginable_id;
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        Session::flash('warning','Hãy nhập số lượng không vượt quá số lượng cho phép');
        return View::make('frontend.cart.show', array(
                'cirCount' => $cirCount,
                'books' => $books,
        ));
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
        Session::flash('success', 'Đã làm trống giỏ sách!');
        return Redirect::to(route('fe.home'));
    }

    public function submit() {
        $countLocal = 0;
        $countRemote = 0;
        $cart = json_decode(Input::get('cart'), true);
        $readerId = Auth::user()->loginable_id;
        $circulations = Circulation::where('reader_id', '=', $readerId)
            ->where('returned', '=', false)
            ->with('bookItem', 'bookItem.book')
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        foreach ($cart as $item) {
            if ($item['scope'] == Book::SCOPE_LOCAL) {
                $countLocal+= $item['number'];
            } else {
                $countRemote+= $item['number'];
            }
        }
        $countLocal += $cirCount['local'];
        $countRemote+= $cirCount['remote'];
        if ($countLocal > $this->configs['max_book_local'] || $countLocal > $this->configs['max_book_remote']) {
            Session::flash('error', 'Số lượng đăng kí mượn lớn hơn cho phép, vui lòng chọn lại');
            return Redirect::back();
        } else {
            
        }
    }

}
