@extends('layouts.admin')
@section('currentMenu','statistics_book')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thống kê tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span5'>
                <div class='content-row'>
                    <div class='span5'>
                        Tổng số tài liệu:
                    </div>
                    <div class='span7'>
                        4000
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Tài liệu đang lưu hành:
                    </div>
                    <div class='span7'>
                        2500
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Tổng số cuốn/bản:
                    </div>
                    <div class='span7'>
                        5600
                    </div>
                </div>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Tùy chọn thống kê</h2>
                </div>
                <div class='content'>
                    <div class='span12'>
                        <form url='/'>
                            <div class='span4'>
                                <div class='controls-row'>
                                    <div class='span4'>
                                        Từ ngày:
                                    </div>
                                    <div class='span8'>
                                        <input class='datepicker' name='start_date' type='text'>
                                    </div>
                                </div>
                            </div>
                            <div class='span4'>
                                <div class='controls-row'>
                                    <div class='span4'>
                                        Đến ngày:
                                    </div>
                                    <div class='span8'>
                                        <input class='datepicker' name='end_date' type='text'>
                                    </div>
                                </div>
                            </div>
                            <div class='span2'>
                                <div class='controls-row'>
                                    <label class='checkbox inline'>
                                        <input name='whole' type='checkbox'>
                                        Toàn bộ
                                    </label>
                                </div>
                            </div>
                            <div class='span2'>
                                <div class='controls-row'>
                                    <button class='btn btn-primary' type='submit'>Xem thống kê</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class='result-wrapper span5'>
                        <div class='content-row'>
                            <div class='span5'>
                                Tài liệu mới:
                            </div>
                            <div class='span4'>
                                598
                            </div>
                        </div>
                        <div class='content-row'>
                            <div class='span5'>
                                Số lượng lưu hành:
                            </div>
                            <div class='span4'>
                                500
                            </div>
                        </div>
                        <div class='content-row'>
                            <div class='span5'>
                                Số lượt mượn:
                            </div>
                            <div class='span4'>
                                1500
                            </div>
                        </div>
                        <div class='content-row'>
                            <button class='btn btn-primary'>
                                <i class='i-printer'></i>
                                In báo cáo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop