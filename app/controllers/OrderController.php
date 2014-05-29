<?php

class OrderController extends BaseController {

    public function index() {
        $orders = Order::with('reader', 'book')
            ->where('status', Order::SS_NEW)
            ->orderBy('created_at', 'DESC')
            ->paginate(self::ITEMS_PER_PAGE);
        if (Request::ajax()) {
            return View::make('order.partials._index', array(
                    'orders' => $orders
            ));
        } else {
            return View::make('order.index', array(
                    'orders' => $orders
            ));
        }
    }

    public function approve() {
        
    }

    public function reject() {
        
    }

}
