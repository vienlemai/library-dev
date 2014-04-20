@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Mượn trả tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span12'>
                <div class='span6'>
                    <div class='block'>
                        <div class='head'>
                            <h2>Thông tin bạn đọc</h2>
                            <ul class='buttons'>
                                <li>
                                    <a class='block_toggle' href='javascript:void(0)'>
                                        <i class='i-arrow-down-3'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class='content' id="circulation-reader">
                            <div class='span5'>
                                <div class='content-row'>
                                    <input class='barcode-scanner' data-url="{{route('circulation.reader')}}" placeholder='Mã thẻ' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='span6'>
                    <div class='block'>
                        <div class='head'>
                            <h2>Quét tài liệu</h2>
                            <ul class='buttons'>
                                <li>
                                    <a class='block_toggle' href='#'>
                                        <i class='i-arrow-down-3'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class='content' id="circulation-book">
                            <div class='span5'>
                                <div class='content-row'>
                                    <input class='barcode-scanner' data-url="{{route('circulation.book')}}" placeholder='Mã tài liệu' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='span12'>
                <span class="loading" style="display: none">
                    <img src="{{asset('img/loading.gif')}}"/>
                    Đang tải . . .
                </span>
                <div class='block'>
                    <div class='head'>
                        <h2>Tài liệu đang mượn</h2>                        
                        <ul class='buttons'>
                            <li>
                                <a class='block_toggle' href='#'>
                                    <i class='i-arrow-down-3'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class='content' id="circulation-list-book">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
