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
<div class="modal hide fade" id="modal-book-details-{{$book->id}}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Chi Tiết Tài Liệu - <?php echo $book->title ?></h4>
    </div>
    <div class="modal-body">

    </div>
    <div class="modal-footer">
        <?php if (Auth::check()): ?>
            <?php $book_already_in_cart = in_array($book->id, $books_in_cart) ?>
            <a class='btn btn-success btn-add-to-cart <?php if ($book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.add_to_cart') ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Thêm vào giỏ</a>
            <a class='btn btn-danger btn-remove-from-cart <?php if (!$book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.remove_from_cart') ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Xóa khỏi giỏ</a>
            <a href='<?php echo route('fe.cart') ?>' class='btn btn-primary'> <i class='fa fa-shopping-cart'></i> Xem giỏ sách</a>
        <?php endif; ?>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
    </div>
</div>
@stop