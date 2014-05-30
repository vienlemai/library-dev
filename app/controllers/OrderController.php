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
        $orderId = Input::get('id');
        $reasonReject = Input::get('reason');
        if ($reasonReject == '') {
            Session::flash('error', 'Không được để trống lý do từ chối');
            return Redirect::back();
        } else {
            $order = Order::with('book')->findOrFail($orderId);
            $order->reject($reasonReject);
            Session::flash('success', 'Từ chối thành công tài liệu "' . $order->book->title . '"');
            return Redirect::back();
        }
    }

}
