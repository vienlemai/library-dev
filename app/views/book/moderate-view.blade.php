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
                    <a class='btn btn-small' href='{{route('book.moderate')}}'>
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
                            <li>Người gửi : {{$book->cataloger->full_name}}</li>
                            <li>Ngày gửi : {{$book->submitted_at->format('d/m/Y h:i').' ('.$book->submitted_at->diffForHumans().')'}}</li>
                        </ul>
                        <a href="{{route('book.barcode',$book->id)}}" target="_blank" class="btn btn-primary"><i class="icon-print"></i> In mã vạch</a>
                        <a href="{{route('book.label',$book->id)}}" target="_blank" class="btn btn-success"><i class="icon-print"></i> In nhãn</a>
                    </div>
                    <div class="span6">
                        <button class="btn btn-primary" btn-confirm="confirm" data-url="{{route('book.publish',$book->id)}}" data-confirm="Bạn có chắc chắn cho lưu hành tài liệu {{$book->title}} ?">Đồng ý cho lưu hành</button>
                        <button class="btn btn-danger" id="btn-disapprove-book" data-url="">Báo lỗi</button>
                        <form method="POST" action="{{route('book.disapprove',$book->id)}}" style="display: none" id="form-disapprove-book">
                            <div class="controls-row">
                                <label class="control-label">Nhập lý do báo lỗi</label>
                                <div class="controls">                 
                                    <textarea rows="5" name="reason" class="input-block-level editor"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{Session::token()}}"/>
                            <button class="btn btn-primary" style="margin-left: 10px">Đồng ý</button>
                        </form>
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
            <div class='footer'>

            </div>
            <?php echo Former::close() ?>
        </div>
    </div>

</div>
@stop
