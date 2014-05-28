@extends('layouts.frontend')
@section('content')
<?php
$now = Carbon\Carbon::now();

?>
<div class="page-title">
    <i class="fa fa-user"></i> Trang cá nhân
</div>
<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th colspan="7">
                Thông tin tài khoản
            </th> 
        </tr>
    </thead>
</table>
<div class="clear"></div>
<div class='span4'>
    <?php echo Former::horizontal_open(route('fe.update_profile'), 'POST') ?>
    <?php Former::populate($reader) ?>
    <?php echo Former::text('email', 'Email') ?>
    <?php echo Former::text('full_name', 'Họ tên') ?>
    <?php echo Former::text('year_of_birth', 'Ngày sinh')->class('datepicker') ?>
    <?php echo Former::text('class', 'Lớp') ?>
    <?php echo Former::text('phone', 'Điện thoại') ?>
    <div class='control-group'>
        <div class='controls'>
            <button class="btn btn-default" type="submit">Lưu thay đổi</button>
        </div>
    </div>
    <?php echo Former::close() ?>
</div>
<div class='span4'>
    <?php echo Former::horizontal_open(route('fe.update_password'), 'POST') ?>
    <?php echo Former::password('password', 'Mật khẩu mới')->help('Tối thiếu 6 ký tự') ?>
    <?php echo Former::password('password_confirmation', 'Nhập lại') ?>
    <div class='control-group'>
        <div class='controls'>
            <button class="btn btn-default" type="submit">Cập nhật mật khẩu</button>
        </div>
    </div>
    <?php echo Former::close() ?>
</div>
<div class="clear"></div>
<div class='padding-10'>
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th colspan="7">
                    <i class="fa fa-book"></i> Tài liệu đang mượn
                </th> 
            </tr>
            <tr>
                <th style='width:7%'>Mã vạch</th>
                <th style='width:20%'>Tiêu đề</th>
                <th style='width:13%'>Ngày mượn</th>
                <th style='width:13%'>Hết hạn</th>
                <th style='width:12%'>Ghi chú</th>
                <th style='width:8%'>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($borrowing_books as $row): ?>
                <?php
                $ex_times = (int) $extra_times - $row->extensions;
                $isExpired = $row->expired_at->lt($now) && ($now->diffInDays($row->expired_at) > 0);
                $isLocal = $row->bookItem->book->book_scope == Book::SCOPE_LOCAL;

                ?>
                <tr>
                    <td>{{$row->bookItem->barcode}}</td>
                    <td>{{$row->bookItem->book->title}}</td>
                    <td>{{$row->created_at->format('d \t\h\á\n\g m, Y')}}</td>
                    <?php if (!$isExpired): ?>
                        <td>
                            <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') ?>
                        </td>
                    <?php else: ?>
                        <td style="color: red">
                            <?php $diff = $now->diffInDays($row->expired_at); ?>
                            <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') . ' (trễ ' . ($diff) . ' ngày)'; ?>
                        </td>
                    <?php endif; ?>
                    <?php if (!$isExpired): ?>
                        <?php if ($isLocal): ?>
                            <td>Mượn tại chỗ</td>
                        <?php else: ?>
                            <td><?php echo $ex_times > 0 ? 'Còn ' . $ex_times . ' lần gia hạn' : 'Hết quyền gia hạn' ?></td>
                        <?php endif; ?>

                    <?php else: ?>
                        <td style="color: red">
                            <?php echo 'Tiền phạt : ' . ($diff) * $book_expired_fine . ' (đồng)' ?>
                        </td>
                    <?php endif; ?>                    
                    <td class="text-center">
                        <?php if (!$isExpired && !$isLocal && $ex_times): ?>
                            <a href="{{route('fe.extra',$row->id)}}" class="btn btn-success btn-small np">Gia hạn</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="clear"></div>
    <table class='table table-bordered table-striped'>
        <thead >
            <tr>
                <th colspan="7">
                    <i class="fa fa-clock-o"></i>  Lịch sử mượn/trả tài liệu
                </th> 
            </tr>
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
    <div class="clear"></div>    
</div>

@stop