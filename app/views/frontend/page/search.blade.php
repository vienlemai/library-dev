@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-search'></i>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="span10 offset2">
    <form class="form-inline">
        
        <label>Thể loại: </label>
        <select class='input-small'>
            <option>Sách</option>
            <option>Tạp chí</option>
        </select>
        <label class="control-label" for="keyword">Tên hoặc tác giả: </label>
        <input type="text" id="keyword" placeholder="" class='form-control' value='<?php echo $keyword?>'>
        <button type='submit' class='btn'>Tìm</button>

    </form>
</div>
@stop