@extends('layouts.admin')
@section('currentMenu','catalog')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Biên mục tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small btn-primary' href='{{route('book.create')}}'>
                       <i class='i-plus-2'></i>
                        Thêm mới
                    </a>
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
                            <li style="width: 24%">
                                <div class='text-info'>
                                    <?php echo ($count[Book::SS_ADDED]) ?>
                                    <span><?php echo Book::$CAT_SS_LABELS[Book::SS_ADDED] ?></span>
                                </div>
                            </li>
                            <li style="width: 24%">
                                <div class='text-warning'>
                                    <?php echo ($count[Book::SS_SUBMITED]) ?>
                                    <span><?php echo Book::$CAT_SS_LABELS[Book::SS_SUBMITED] ?></span>
                                </div>
                            </li>
                            <li style="width: 24%">
                                <div class='text-error'>
                                    <?php echo ($count[Book::SS_DISAPPROVED]) ?>
                                    <span><?php echo Book::$CAT_SS_LABELS[Book::SS_DISAPPROVED] ?></span>
                                </div>
                            </li>

                            <li style="width: 24%">
                                <div class='text-success'>
                                    <?php echo ($count[Book::SS_PUBLISHED]) ?>
                                    <span><?php echo Book::$CAT_SS_LABELS[Book::SS_PUBLISHED] ?></span>
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
                <li class='active'>
                    <a data-toggle='tab' href='#added'>Tài liệu đang biên mục</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#submitted'>Tài liệu đã gửi</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#disapproved'>Tài liệu lỗi</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#published'>Tài liệu đã lưu hành</a>
                </li>
            </ul>
            <div class='tab-content' id="book-catalog">
                <div class='tab-pane active' id='added'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.catalog.0')->with('books', $books[Book::SS_ADDED]); ?>
                    </div>
                </div>
                <div class='tab-pane' id='submitted'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.catalog.1')->with('books', $books[Book::SS_SUBMITED]); ?>
                    </div>
                </div>
                <!--Tab disapproved-->
                <div class='tab-pane' id='disapproved'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.catalog.2')->with('books', $books[Book::SS_DISAPPROVED]); ?>
                    </div>
                </div>

                <!--Tab published-->
                <div class='tab-pane' id='published'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.catalog.3')->with('books', $books[Book::SS_PUBLISHED]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
@if(false)
<div class='head'>
    <h2>Hiển thị {{$books[Book::SS_ADDED]->count()}}/{{$books[Book::SS_ADDED]->getTotal()}} tài liệu</h2>
    <div class='toolbar-table-right'>
        <div class='input-append'>
            <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" book-type="{{Book::SS_ADDED}}" data-url="{{route('book.catalog.search')}}">
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
                <th style='width:5%'>
                    <input class='checkall' type='checkbox'>
                </th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Số lượng</th>
                <th>Thời gian</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <form action="{{route('book.submit')}}" method="POST" class="form-check">
            {{Form::token()}}
            <?php foreach ($books[Book::SS_ADDED] as $book): ?>

                <tr>
                    <td>
                        <input name="bookId[]" value="{{$book->id}}" class="checkitem" type='checkbox'>
                    </td>
                    <td>{{$book->title }}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->number}}</td>
                    <td>{{$book->created_at->format('d/m/Y h:i').' ('.$book->created_at->diffForHumans().')'}}</td>
                    <td>
                        <div class='row-actions'>
                            <a class='text-info' href="{{route('book.catalog.view',$book->id)}}">
                                <i class='i-magnifier'></i>
                                Xem
                            </a>
                            <a class='text-warning' href='{{route('book.edit',$book->id)}}'>
                               <i class='i-pencil'></i>
                                Sửa
                            </a>
                            <a class='text-error' href='{{route('book.delete',$book->id)}}' data-confirm="Bạn có chắc chắn muốn xóa tài liệu {{$book->title}}" data-method="delete" data-token="{{csrf_token()}}">
                               <i class='i-cancel-2'></i>
                                Xóa
                            </a>			
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>	
        </form>
        </tbody>
    </table>
</div>
<div class='footer'>
    <div class='side'>
        <button class="btn btn-primary btn-check-submit" data-url="{{route('book.submit')}}">Gửi đi kiểm duyệt</button>
        <span class="check-info" style="display: none"></span>
        <span class="loading" style="margin-left: 50px; display: none">
            <img src="{{asset('img/loading.gif')}}"/>
            Đang tải . . .
        </span>
        <div class='side fr'>
            <div class='pagination'>
                {{$books[Book::SS_ADDED]->appends(array('book-type'=>Book::SS_ADDED))->links()}}
            </div>
        </div>
    </div>
</div>
@endif