@extends('layouts.admin')
@section('currentMenu','moderate')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Kiểm duyệt tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <button class="btn btn-primary btn-export-excel" data-modal="show-modal" data-url="{{route('book.export.choose',User::TYPE_MODERATOR)}}">Xuất file excel</button>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span8'>
                <div class='block'>
                    <div class='content closed'>
                        <ul class='boxes nmt'>
                            <li>
                                <div class='text-warning'>
                                    <?php echo ($count[Book::SS_SUBMITED]) ?>
                                    <span><?php echo Book::$MOD_SS_LABEL[Book::SS_SUBMITED] ?></span>
                                </div>
                            </li>
                            <li>
                                <div class='text-error'>
                                    <?php echo ($count[Book::SS_DISAPPROVED]) ?>
                                    <span><?php echo Book::$MOD_SS_LABEL[Book::SS_DISAPPROVED] ?></span>
                                </div>
                            </li>

                            <li>
                                <div class='text-success'>
                                    <?php echo ($count[Book::SS_PUBLISHED]) ?>
                                    <span><?php echo Book::$MOD_SS_LABEL[Book::SS_PUBLISHED] ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.flash')		
        <div class='space'></div>
        <div class='row-fluid'>
            <ul class='nav nav-tabs'>
                <li class="active">
                    <a data-toggle='tab' href='#submitted'>Tài liệu đã gửi lên</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#disapproved'>Tài liệu đã báo lỗi</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#published'>Tài liệu đã lưu hành</a>
                </li>
            </ul>
            <div class='tab-content' id="book-catalog">
                <div class='tab-pane active' id='submitted'>
                    <div class='block table-container'>
                        <div class='head'>
                            <h2>Hiển thị {{$books[Book::SS_SUBMITED]->count()}}/{{$books[Book::SS_SUBMITED]->getTotal()}} tài liệu</h2>
                            <div class='toolbar-table-right'>
                                <div class='input-append'>
                                    <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" book-type="{{Book::SS_SUBMITED}}" data-url="{{route('book.moderate.search')}}">
                                    <button class="btn btn-book-search" type="button">
                                        <span class='icon-search'></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content np table-sorting">
                            <table cellpadding='0' cellspacing='0' class='sort' width='100%'>
                                <thead>
                                    <tr>
                                        <th>TT</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Số lượng</th>
                                        <th>Ngày gửi</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = $books[Book::SS_SUBMITED]->getFrom(); ?>
                                    <?php foreach ($books[Book::SS_SUBMITED] as $book): ?>
                                        <tr>
                                            <td>{{$index++}}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->number}}</td>
                                            <td>{{$book->submitted_at->format('d/m/Y h:i').' ('.$book->submitted_at->diffForHumans().')'}}</td>
                                            <td>
                                                <div class='row-actions'>
                                                    <a class='text-info' href='{{route('book.moderate.view',$book->id)}}'>
                                                        <i class='i-magnifier'></i>
                                                        Xem
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='footer'>
                            <span class="loading" style="margin-left: 50px; display: none">
                                <img src="{{asset('img/loading.gif')}}"/>
                                Đang tải . . .
                            </span>
                            <div class='side fr'>
                                <div class='pagination'>
                                    {{$books[Book::SS_SUBMITED]->appends(array('book-type'=>Book::SS_SUBMITED))->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Tab disapproved-->
                <div class='tab-pane' id='disapproved'>
                    <div class='block table-container'>
                        <div class='head'>
                            <h2>Hiển thị {{$books[Book::SS_DISAPPROVED]->count()}}/{{$books[Book::SS_DISAPPROVED]->getTotal()}} tài liệu</h2>
                            <div class='toolbar-table-right'>
                                <div class='input-append'>
                                    <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" book-type="{{Book::SS_DISAPPROVED}}" data-url="{{route('book.moderate.search')}}">
                                    <button class="btn btn-book-search" type="button">
                                        <span class='icon-search'></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class='content np table-sorting'>
                            <table cellpadding='0' cellspacing='0' class='sort' width='100%'>
                                <thead>
                                    <tr>
                                        <th>TT</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Số lượng</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = $books[Book::SS_DISAPPROVED]->getFrom(); ?>
                                    <?php foreach ($books[Book::SS_DISAPPROVED] as $book): ?>
                                        <tr>
                                            <td>{{ $index ++ }}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->number}}</td>
                                            <td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='footer'>
                            <span class="loading" style="margin-left: 50px; display: none">
                                <img src="{{asset('img/loading.gif')}}"/>
                                Đang tải . . .
                            </span>
                            <div class='side fr'>
                                <div class='pagination'>
                                    {{$books[Book::SS_DISAPPROVED]->appends(array('book-type'=>Book::SS_DISAPPROVED))->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab published-->
                <div class='tab-pane' id='published'>
                    <div class='block table-container'>
                        <div class='head'>
                            <h2>Hiển thị {{$books[Book::SS_PUBLISHED]->count()}}/{{$books[Book::SS_PUBLISHED]->getTotal()}} tài liệu</h2>
                            <div class='toolbar-table-right'>
                                <div class='input-append'>
                                    <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" book-type="{{Book::SS_PUBLISHED}}" data-url="{{route('book.moderate.search')}}">
                                    <button class="btn btn-book-search" type="button">
                                        <span class='icon-search'></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class='content np table-sorting'>
                            <table cellpadding='0' cellspacing='0' class='sort' width='100%'>
                                <thead>
                                    <tr>
                                        <th>TT</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Số lượng</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày lưu hành</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = $books[Book::SS_PUBLISHED]->getFrom(); ?>
                                    <?php foreach ($books[Book::SS_PUBLISHED] as $book): ?>
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->number}}</td>
                                            <td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
                                            <td>{{$book->published_at->format('d/m/Y h:i').' ('.$book->published_at->diffForHumans().')'}}</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='footer'>
                            <span class="loading" style="margin-left: 50px; display: none">
                                <img src="{{asset('img/loading.gif')}}"/>
                                Đang tải . . .
                            </span>
                            <div class='side fr'>
                                <div class='pagination'>
                                    {{$books[Book::SS_PUBLISHED]->appends(array('book-type'=>Book::SS_PUBLISHED))->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop