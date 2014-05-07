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
            <div class='block'>
                <div class='head'>
                    <h2>Chọn các danh mục thống kê</h2>
                    <div class="buttons">
                        <label class='checkbox inline'>
                            <!--<input type='checkbox' class="checkall" checked data-checkall-for="#statistics-reader-options">-->
                            <!--Toàn bộ &nbsp;-->
                        </label>
                    </div>
                </div>
                <div class='content'>
                    <div class='span12' id="statistics-reader-options">
                        <?php
                        Former::framework('Nude');
                        echo Former::inline_open(route('statistics.reader'))->method('POST')
                            ->class('form-ajax')->data_update_html_for('#statistics-result-container')
                            ->id('form-statistics-options')

                        ?>
                        <?php Former::token() ?>
                        <input name='all_readers' type='hidden' value="0">
                        <input name='borrowing_readers' type='hidden' value="0">
                        <input name='borrowing_times' type='hidden' value="0">
                        <div class='span3'>
                            <label class='checkbox inline'>
                                <input name='all_readers' checked type='checkbox' value="1" class="at-least-one">
                                Tổng số bạn đọc
                            </label>
                        </div>

                        <div class='span3'>
                            <label class='checkbox inline'>
                                <input name='borrowing_readers' checked type='checkbox' value="1" class="at-least-one">
                                Tổng số bạn đọc đang mượn
                            </label>
                        </div>
                        <div class='span3'>
                            <label class='checkbox inline'>
                                <input name='borrowing_times' checked type='checkbox' value="1" class="at-least-one">
                                Tổng số lượt mượn
                            </label>
                        </div>
                        <div class='span2'>
                            <div class='controls-row'>
                                <button class='btn btn-primary' type='submit'>Xem thống kê</button>
                            </div>
                        </div>

                        <?php Former::close() ?>
                    </div>
                    <div class='' id="statistics-result-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop