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
        $orders = Order::where('reader_id', $readerId)
            ->where('status', Order::SS_NEW)
            ->get();
        $cirCount = $this->_countCirculationScope($circulations);
        $orderCount = $this->_countOrderScope($orders);
        //dd($orderCount);
        Session::flash('warning', 'Hãy nhập số lượng không vượt quá số lượng cho phép');
        return View::make('frontend.cart.show', array(
                'cirCount' => $cirCount,
                'orderCount' => $orderCount,
                'books' => $books,
        ));
    }

    public function remove($book_id) {
        $books_in_cart = $this->booksInCart();
        if (Book::find($book_id) && in_array($book_id, $books_in_cart)) {
            $key = array_search($book_id, $books_in_cart);
            unset($books_in_cart[$key]);
            Session::put('books_in_cart', $books_in_cart);
            $success = true;
        } else {
            $success = false;
        }
        if (Request::ajax()) {
            return Response::json(array(
                    'success' => $success,
                    'books_count' => count($this->booksInCart())
            ));
        } else {
            return Redirect::to(route('fe.cart'));
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
            if (!empty($item)) {
                if ($item['scope'] == Book::SCOPE_LOCAL) {
                    $countLocal+= $item['number'];
                } else {
                    $countRemote+= $item['number'];
                }
            }
        }
        $countLocal += $cirCount['local'];
        $countRemote+= $cirCount['remote'];
        if ($countLocal > $this->configs['max_book_local'] || $countRemote > $this->configs['max_book_remote']) {
            Session::flash('error', 'Số lượng đăng kí mượn lớn hơn cho phép, vui lòng chọn lại');
            return Redirect::back();
        } else {
            foreach ($cart as $item) {
                if (!empty($item)) {
                    $order = new Order(array(
                        'reader_id' => $readerId,
                        'book_id' => $item['bookId'],
                        'count' => $item['number'],
                        'scope' => $item['scope'],
                    ));
                    $order->save();
                }
            }
            Session::put('books_in_cart', array());
            Session::flash('success', 'Đăng kí mượn thành công');
            return Redirect::route('fe.orders');
        }
    }

}
