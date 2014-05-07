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
                    <h2>Chọn các danh mục thống kê</h2>
                </div>
                <div class='content'>
                    <div class='span12' id="statistics-reader-options">
                        <?php
                        Former::framework('Nude');
                        echo Former::inline_open(route('statistics.book'))->method('POST')
                            ->class('form-ajax')->data_update_html_for('#statistics-result-container')

                        ?>
                        <?php Former::token() ?>
                        <input name='all_books' type='hidden' value="0">
                        <input name='storages' type='hidden' value="0">
                        <div class='span3'>
                            <label class='checkbox inline'>
                                <input name='all_books' checked type='checkbox' value="1" class="at-least-one">
                                Tổng số tài liệu
                            </label>
                        </div>
                        <div class='span3'>
                            <label class='checkbox inline'>
                                <input name='storages' checked type='checkbox' value="1" class="at-least-one">
                                Tài liệu trong kho
                            </label>
                        </div>
                        <div class='span2'>
                            <div class='controls-row'>
                                <button class='btn btn-primary' type='submit'>Xem thống kê</button>
                            </div>
                        </div>

                        <?php Former::close() ?>
                    </div>
                    <div id="statistics-result-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop