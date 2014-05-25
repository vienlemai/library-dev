@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-search'></i>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="offset1">
    <form action="<?php echo route('fe.search') ?>" method="GET" class="form-inline">
        <label>Thể loại: </label>
        <?php echo Former::select('type', '')->options(bookTypesForSelect())->class('input-small form-control') ?>
        <label class="control-label" for="keyword">Tên hoặc tác giả: </label>
        <input type="text" name="keyword" placeholder="" class='form-control' value='<?php echo $keyword ?>'>
        <button type='submit' class='btn'><i class="fa fa-search"></i> Tìm</button>

    </form>
</div>
<div id="search-result">
    <?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
</div>
@stop