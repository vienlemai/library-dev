@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class="fa fa-user"></i> Trang cá nhân
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
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Thể loại</th>
                <th>Hình thức mượn</th>
                <th>Ngày mượn</th>
                <th>Hạn trả</th>
                <th>Số lần gia hạn</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($borrowing_books as $circulation): ?>
                <tr>
                    <td><?php echo $index++ ?></td>
                    <td><?php echo $circulation->bookItem->book->title ?></td>
                    <td><?php echo $circulation->bookItem->book->getBookTypeName() ?></td>
                    <td><?php echo $circulation->bookItem->book->scopeName() ?></td>
                    <td><?php echo $circulation->created_at->format('d \t\h\á\n\g m, Y') ?></td>
                    <td><?php echo $circulation->expired_at->format('d \t\h\á\n\g m, Y') ?></td>
                    <td></td>
                    <td>Hết hạn .. </td>
                    <td></td>
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
</div>

@stop