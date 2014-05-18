@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-search'></i>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="span10 offset2">
    <form action="#" class="form-horizontal">          
        <div class='span2'>
            <label class="control-label" for="keyword">Nhập tên sách, tác giả</label>
        </div>

        <div class='span6'>
            <input type="text" id="keyword" placeholder="" class='form-control'>
            <button type='submit' class='btn'>Tìm</button>
        </div>

    </form>
</div>
@stop