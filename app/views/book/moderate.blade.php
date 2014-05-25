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
                        <?php echo View::make('book.partials.moderate.1', array('books' => $books[Book::SS_SUBMITED]))->render(); ?>
                    </div>
                </div>
                <!--Tab disapproved-->
                <div class='tab-pane' id='disapproved'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.moderate.2', array('books' => $books[Book::SS_DISAPPROVED]))->render(); ?>
                    </div>
                </div>

                <!--Tab published-->
                <div class='tab-pane' id='published'>
                    <div class='block table-container'>
                        <?php echo View::make('book.partials.moderate.3', array('books' => $books[Book::SS_PUBLISHED]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop