<?php

class CirculationController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        return View::make('circulation.index');
    }

    public function loadReader() {
        $barcode = Input::get('barcode');
        $reader = Reader::where('barcode', '=', $barcode)->first();
        if (!empty($reader)) {
            $result['status'] = true;
            $result['reader_html'] = View::make('circulation.partials.reader', array('reader' => $reader))->render();
        } else {
            $result['status'] = false;
            $result['message'] = 'Không tìm thấy bạn đọc';
        }
        return Response::json($result);
    }

}
