@extends('layouts.frontend')
@section('content')
<div class="page-title">
    Giỏ sách của bạn
</div>
<div class="clear"></div>
<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Trạng thái</th>
            <th>Số lượng</th>
            <th>Loại hình mượn</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0 ?>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo++$index ?></td>
                <td><?php echo $book->title ?></td>
                <td><?php echo $book->author ?></td>
                <td><?php echo $book->getBookTypeName() ?></td>
                <td></td>
                <td>
                    <input class="input-small" type='number' name='count' value='1'/>
                </td>
                <td>
                    <select class="input-small">
                        <option>Tại chỗ</option>
                        <option>Về nhà</option>
                    </select>
                </td>
                <td>
                    <a href='javascript:void(0)' class='btn btn-small btn-danger'>Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<div class="clear"></div>
<?php if (count($books) > 0) : ?>
    <div class='pull-right'>
        <form action=''>
            <a data-toggle='modal' href='#modal-confirm-clear-cart'class='btn btn-warning'><i class='fa fa-times'></i> Làm trống giỏ sách</a>
            <button class='btn btn-success'><i class='fa fa-upload'></i> Yêu cầu đặt sách</button>
        </form>
    </div>
<?php else: ?>
    <p class='text-muted text-italic text-center'>Chưa có tài liệu nào trong giỏ!</p>
<?php endif; ?>
<div class="modal hide fade" id='modal-confirm-clear-cart'>
    <?php echo Former::open(route('fe.clear_cart'), 'POST') ?>
    <div class="modal-body">
        <h4 class='text-warning'>Bạn chắc chắn muốn xóa toàn bộ sách khỏi giỏ?</h4>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" type='submit'><i class='fa fa-check'></i> Đồng ý</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Hủy</button>
    </div>
    <?php echo Former::close() ?>
</div>
@stop