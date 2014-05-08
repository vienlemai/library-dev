@extends('layouts.admin')
@section('currentMenu','dashboard')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Trang chủ
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span9'>
                <div class='block table-container'>
                    @include('activity._listing')
                </div>
            </div>
            <div class='span3'>
                <div class='block'>
                    <div class='head'>
                        <h2>
                            Thông tin tổng quát
                        </h2>
                    </div>
                    <div class='content'>
                        <ul>
                            <li>Tổng số tài liệu: {{$count['book_total']}}</li>
                            <ul>
                                <li>Sách : {{$count['book_book']}}</li>
                                <li>Tạp chí/biểu mẫu: {{$count['book_magazine']}}</li>
                            </ul>
                            <li>Tổng số bạn đọc: {{$count['reader_total']}}</li>
                            <ul>
                                <li>Sinh viên: {{$count['reader_student']}}</li>
                                <li>Giảng viên: {{$count['reader_teacher']}}</li>
                                <li>Cán bộ: {{$count['reader_staff']}}</li>
                            </ul>
                            <li>Tổng số nhân viên: {{$count['user']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop