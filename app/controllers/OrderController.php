<?php

class OrderController extends BaseController {

    public function index() {
        $orders = Order::with('reader', 'book')
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
        $orderId = Input::get('id');
        $timePickUpInput = Input::get('time_pick_up');
        $order = Order::with('book')->findOrFail($orderId);
        try {
            $timePickUp = Carbon\Carbon::createFromFormat('d/m/Y', $timePickUpInput);
            $order->approve($timePickUp);
            Session::flash('success', 'Thao tác thành công, đã đồng ý cho mượn tài liệu "' . $order->book->title . '"' . ', ngày hẹn : ' . $timePickUp->format('d/m/y'));
            return Redirect::back();
        } catch (Exception $ex) {
            Session::flash('error', 'Thời gian hẹn không hợp lệ, vui lòng kiểm tra lại');
            return Redirect::back();
        }
    }

    public function reject() {
        
    }

}
