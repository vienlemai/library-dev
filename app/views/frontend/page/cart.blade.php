@extends('layouts.frontend')
@section('content')
<div class="page-title">
    Giỏ sách
</div>
<div class="search-box">
    <form action="#" class="form-horizontal">          
        <div class="control-group">
            <div class="controls">
                <input type="text" id="keyword" name="keyword" placeholder="Nhập tiêu đề tài liệu để tìm kiếm . . ." style="width: 380px">
                <button type='submit' class='btn'><i class='fa fa-search'></i></button>
            </div>
        </div>
    </form>
</div>
<div class="clear"></div>
@stop