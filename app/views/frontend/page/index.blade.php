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
<div class="clear"></div>
<div id='search-result'>
    <div class="book">
        <h4 class='book-title'>
            Tắt đèn
        </h4>
        <div class="book-desciption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
        </div>    
        <div class="clear"></div>
    </div>
    <div class="book">
        <h4 class='book-title'>
            Tắt điện
        </h4>
        <div class="book-desciption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
        </div>    
        <div class="clear"></div>
    </div>
    <div class="book">
        <h4 class='book-title'>
            Cúp nước
        </h4>
        <div class="book-desciption">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
        </div>    
        <div class="clear"></div>
    </div>
    <div class="pagination text-center">
        <span class="disabled">&lt;&lt;</span><span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">&gt;&gt;</a>
    </div>
</div>
@stop