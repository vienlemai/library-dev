@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-home'></i> Trang chủ
</div>
<div class="search-box">
    <form action="<?php echo route('fe.search')?>" class="form-horizontal" method='GET'>          
        <div class="control-group">
            <div class="controls">
                <input type="text"  name="keyword" placeholder="Nhập tiêu đề tài liệu để tìm kiếm . . ." style="width: 380px">
                <button type='submit' class='btn'><i class='fa fa-search'></i></button>
            </div>
        </div>
    </form>
</div>
<div class="clear"></div>
<?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
@stop