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
                    <div class='span4'>
                        <?php echo $result['readers_count'] ?>
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Bạn đọc đang mượn:
                    </div>
                    <div class='span4'>
                        <?php echo $result['borrowing_readers_count'] ?>
                    </div>
                </div>
                <div class='content-row'>
                    <div class='span5'>
                        Số lượt mượn:
                    </div>
                    <div class='span4'>
                        <?php echo $result['borrow_times_count'] ?>
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
                        <?php
                        echo Former::horizontal_open(route('statistics.reader'))->method('POST')
                            ->class('form-ajax')->data_update_html_for('#result-container')

                        ?>
                        <div class='span4'>
                            <div class='controls-row'>
                                <div class='span3'>
                                    Từ ngày:
                                </div>
                                <div class='span8'>
                                    <input class='datepicker' name='start_date' type='text'>
                                </div>
                            </div>
                        </div>
                        <div class='span4'>
                            <div class='controls-row'>
                                <div class='span3'>
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
                        <?php Former::token() ?>
                        <?php Former::close() ?>
                    </div>
                    <div class='span5' id="result-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop