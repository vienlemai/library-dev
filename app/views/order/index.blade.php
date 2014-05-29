@extends('layouts.admin')
@section('currentMenu','dashboard')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách bạn đọc đăng ký mượn tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            @include('partials.flash')
            <div class="block table-container">
                <?php
                echo View::make('order.partials._index', array(
                    'orders' => $orders
                ))->render()

                ?>
            </div>
        </div>
    </div>
</div>

@stop
@section('extra_html')
<div class="modal hide fade" id="modal-order-approve">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Nhập ngày hẹn bạn đọc đến lấy tài liệu</h4>
    </div>
    <form id="form-approve-order" method="POST" action="{{route('order.approve')}}">        
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="title">Ngày hẹn</label>
                <div class="controls">
                    <input type="text" name="time_pick_up" class="input-xlarge datepicker">
                </div>
            </div>
            <input class="order-id" type="hidden" name="id" value=""/>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Đồng ý</button>
            <button type="button" class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
        </div>
        <input class="" type="hidden" name="_token" value="{{Session::token()}}"/>
    </form>
</div>

<div class="modal hide fade" id="modal-order-reject">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Nhập lý do từ chối cho mượn</h4>
    </div>
    <form id="form-approve-order" method="POST" action="{{route('order.reject')}}">        
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="title">Ngày hẹn</label>
                <div class="controls">
                    <input type="text" name="time_pick_up" class="input-xlarge datepicker">
                </div>
            </div>
            <input class="order-id" type="hidden" name="id" value=""/>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Đồng ý</button>
            <button type="button" class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
        </div>
        <input class="" type="hidden" name="_token" value="{{Session::token()}}"/>
    </form>
</div>
@stop
