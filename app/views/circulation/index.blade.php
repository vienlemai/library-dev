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
                    <div class='block' id="circulation-reader">
                        <div class='head'>
                            <h2>Thông tin bạn đọc</h2>
                            <ul class='buttons'>
                                <li>
                                    <a class='block_toggle' href='#'>
                                        <i class='i-arrow-down-3'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class='content np'>
                            <div class='span5'>
                                <div class='content-row'>
                                    <input class='barcode-scanner input-xlarge' data-url="{{route('circulation.reader')}}" placeholder='Mã thẻ' type='text'>
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
                        <div class='content np'>
                            <div class='span5'>
                                <div class='content-row'>
                                    <input class='barcode-scanner' placeholder='Mã tài liệu' type='text'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='span12'>
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
                    <div class='content np'>
                        <table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
                            <thead>
                                <tr>
                                    <th style='width:20%'>Tiêu đề</th>
                                    <th style='width:10%'>Thể loại</th>
                                    <th style='width:15%'>Ngày mượn</th>
                                    <th style='width:15%'>Ngày trả</th>
                                    <th style='width:10%'>Kho</th>
                                    <th style='width:12%'>Ghi chú</th>
                                    <th style='width:13%'>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
