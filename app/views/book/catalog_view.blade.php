@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thông tin tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('book.catalog')}}'>
                        <i class='i-reply'></i>
                        Danh sách tài liệu
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            @include('partials.flash')
            <div class="well-small">
                <div class="row-fluid">
                    <div class="span4">
                        <h4>{{$book->title}}</h4>
                        <ul>
                            <li>Ngày tạo: {{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</li>
                            <li>Thể loại : <?php echo $book->book_type == Book::TYPE_BOOK ? 'Sách' : 'Tạp chí/biểu mẫu' ?></li>
                            <?php if ($book->status != Book::SS_ADDED): ?>
                                <li><?php echo 'Ngày gửi: ' . $book->submitted_at->format('d/m/Y h:i') . ' (' . $book->submitted_at->diffForHumans() . ')' ?></li>
                            <?php endif; ?>
                            <li>Trạng thái: {{Book::$CAT_SS_LABELS[$book->status]}}</li>
                            <?php if ($book->status == Book::SS_PUBLISHED): ?>
                                <li>Người kiểm duyệt: {{$book->moderator->full_name}}</li>
                                <li class="text-success">Ngày lưu thông: <?php echo $book->published_at->format('d/m/Y h:i') . '(' . $book->published_at->diffForHumans() . ')' ?></li>
                            <?php elseif ($book->status == Book::SS_DISAPPROVED): ?>
                                <li class="text-error">Thông tin lỗi : </li>
                                <div class="text-error book-error-info"><?php echo $book->error_reason ?></div>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="span4">
                        <?php if ($book->status == Book::SS_DISAPPROVED) : ?>
                            <a href="{{route('book.edit',$book->id)}}" class="btn btn-primary">Sửa lỗi</a>
                        <?php elseif ($book->status == Book::SS_ADDED): ?>
                            <a href="{{route('book.edit',$book->id)}}" class="btn btn-primary">Chỉnh sửa</a>                            
                        <?php endif; ?>
                        <a href="#" onclick="window.open('{{route('book.barcode',$book->id)}}')" class="btn btn-primary"><i class="icon-print"></i> In mã vạch</a>
                    </div>

                </div>
            </div>
            <div class="row-fluid">
                <?php
                if ($book->isBook()) {
                    echo View::make('book.partials.view_book', array(
                        'book' => $book,
                        'levels' => Book::$LEVELS,
                        'path' => $path,
                    ))->render();
                } else {
                    echo View::make('book.partials.view_magazine', array(
                        'book' => $book,
                        'levels' => Book::$LEVELS,
                        'path' => $path,
                    ))->render();
                }

                ?>
            </div>
        </div>
    </div>

</div>
@stop
