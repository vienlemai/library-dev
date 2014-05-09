@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <span class="title_icon"><img src="images/bullet3.gif" alt="" title=""></span>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="">
    <div class="form_subtitle">create new account</div>
    <form action="#" class="form-horizontal">          
        <div class="control-group">
            <label class="control-label" for="keyword">Nhập tên sách, tác giả ...</label>
            <div class="controls">
                <input type="text" id="keyword" placeholder="">
                <button type='submit' class='btn'><i class='fa fa-search'></i></button>
            </div>
        </div>
    </form>
</div>
@stop