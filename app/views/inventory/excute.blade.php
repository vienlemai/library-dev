@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Kiểm kê tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thông tin kiểm kê</h2>
                </div>
                <div class='content'>
                    <dl class="dl-horizontal">
                        <dt>Tiêu đề: </dt>
                        <dd>{{$inventory->title}}</dd>
                        <dt>Lý do: </dt>
                        <dd>{{$inventory->reason}}</dd>
                    </dl>
                </div>
            </div>
            <div class='row-fluid'>
                <div class='block'>
                    <div class='head'>
                        <h2>Quét toàn bộ tài liệu có trong thư viện</h2>
                    </div>
                    <div class='content np'>
                        <h4 class='offset2'>Số tài liệu đã quét : 0</h4>
                        <hr>
                        <div class='controls-row'>
                            <div class='span2'>
                                <label class='control-label'>Chọn kho</label>
                            </div>
                            <div class='span10'>
                                <select class='input-xlarge'>
                                    <option>Kho A</option>
                                    <option>Kho B</option>
                                </select>
                            </div>
                        </div>
                        <div class='controls-row'>
                            <div class='span2'>
                                <label class='control-label'>Mã tài liệu</label>
                            </div>
                            <div class='span10'>
                                <input class='input-xxlarge' type='text'>
                            </div>
                        </div>
                        <div class='controls-row'>
                            <div class='span3 offset2'>
                                <button class='btn btn-primary'>Kết thúc kiểm kê</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop