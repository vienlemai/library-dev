@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Chỉnh sửa tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href="{{route('book.catalog')}}">
                        <i class='i-reply'></i>
                        Danh sách tài liệu
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>

            <?php
            if ($book->isBook()) {
                echo View::make('book.partials.edit_book', array(
                    'book' => $book,
                    'storageOptions' => $storageOptions,
                    'levels' => Book::$LEVELS,
                    'scopes' => $scopes,
                    'readerTypes' => $readerTypes,
                ))->render();
            } else {
                echo View::make('book.partials.edit_magazine', array(
                    'book' => $book,
                    'storageOptions' => $storageOptions,
                    'levels' => Book::$LEVELS,
                    'scopes' => $scopes,
                    'readerTypes' => $readerTypes,
                ))->render();
            }

            ?>
            <div class="space"></div>
            <div class='footer'>
                <div class='text-center'>
                    <a class='btn' type="reset" href="{{route('book.catalog')}}">
                        <i class='i-ccw'></i>
                        Hủy bỏ
                    </a>
                    <button class='btn btn-success'>
                        <i class='i-checkmark-2'></i>
                        Lưu
                    </button>
                </div>
            </div>
            <?php echo Former::close() ?>
        </div>
    </div>

</div>
@stop
