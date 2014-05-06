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
                        'levels' => Book::$LEVELS
                    ))->render();
                } else {
                    echo View::make('book.partials.edit_magazine', array(
                        'book' => $book,
                        'storageOptions' => $storageOptions,
                        'levels' => Book::$LEVELS
                    ))->render();
                }

                ?>
            
        </div>
    </div>

</div>
@stop
