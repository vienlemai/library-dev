@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <span class="title_icon"><img src="images/bullet3.gif" alt="" title=""></span>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="text-center span6 offset2">
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