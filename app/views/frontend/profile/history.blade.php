@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class="fa fa-clock-o"></i>  Lịch sử mượn / trả tài liệu
</div>
<div class="clear"></div>
    <table class='table table-bordered table-striped'>
        <thead >
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Hình thức mượn</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop