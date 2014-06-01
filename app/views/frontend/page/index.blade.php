@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-home'></i> Trang chủ
</div>
<div class="search-box">
    <form action="<?php echo route('fe.search') ?>" class="form-horizontal" method='GET'>          
        <div class="control-group">
            <div class="controls">
                <input type="text"  name="keyword" placeholder="Nhập tiêu đề tài liệu để tìm kiếm . . ." style="width: 380px">
                <button type='submit' class='btn'><i class='fa fa-search'></i></button>
            </div>
        </div>
    </form>
</div>
<div class="clear"></div>
<div id="books-index">
    <?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
</div>
<div id="right-sidebar">
    <div class="sidebar-box">
        <h4><i class="fa fa-bookmark"></i> Tài liệu mới nhất</h4>
        <ul>
            <?php foreach ($newest_books as $book) : ?>
                <li>
                    <a href="#"><?php echo ucfirst($book->title) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="sidebar-box">
        <h4><i class="fa fa-star"></i> Tài liệu mượn nhiều</h4>
        <ul>
            <?php foreach ($top_books as $book) : ?>
                <li>
                    <a href="#"><?php echo ucfirst($book->title) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

@stop