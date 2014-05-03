@extends('layouts.admin')
@section('currentMenu','statistics_reader')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thống kê bạn đọc
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span5'>
                <div class='content-row'>
                    <div class='span5'>
                        Tổng số bạn đọc:
                    </div>
                    <div class='span7'>
                        760
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Số thẻ hết hạn:
                    </div>
                    <div class='span7'>
                        15
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Bạn đọc đang mượn:
                    </div>
                    <div class='span7'>
                        200
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
                                        <input name='start_date' type='text'>
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
                                        <input class='datepicker' name='whole' type='checkbox'>
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
                                Đăng ký mới:
                            </div>
                            <div class='span4'>
                                145
                            </div>
                        </div>
                        <div class='content-row'>
                            <div class='span5'>
                                Trễ hạn:
                            </div>
                            <div class='span4'>
                                10
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