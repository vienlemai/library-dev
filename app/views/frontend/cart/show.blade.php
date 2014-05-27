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
            <th>Hình thức mượn</th>
            <th>Số lượng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0 ?>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo ++$index ?></td>
                <td><a href="#modal-book-details-{{$book->id}}"  data-toggle='modal'><?php echo $book->title ?></a>
                    <div class="modal hide fade" id="modal-book-details-{{$book->id}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Chi Tiết Tài Liệu - <?php echo $book->title ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php if ($book->isBook()): ?>
                                <dl class="dl-horizontal">
                                    <dt>Nhan đề: </dt>
                                    <dd>kinh dịch diễn giải</dd>
                                    <dt>Nhan đề song song: </dt>
                                    <dd>{{!empty($book->sub_title)?$book->sub_title:'(trống)'}}</dd>
                                    <dt>Tác giả: </dt>
                                    <dd>{{$book->author}}</dd>
                                    <dt>Dịch giả: </dt>
                                    <dd>{{!empty($book->translator)?$book->translator:'(trống)'}}</dd>
                                    <dt>Thông tin xuất bản: </dt>
                                    <dd>{{!empty($book->publish_info)?$book->publish_info:'(trống)'}}</dd>
                                    <dt>Nhà xuất bản/Nơi xuất bản: </dt>
                                    <dd>{{!empty($book->publisher)?$book->publisher:'(trống)'}}</dd>
                                    <dt>Nhà in: </dt>
                                    <dd>{{!empty($book->printer)?$book->printer:'(trống)'}}</dd>
                                    <dt>Số trang: </dt>
                                    <dd>{{!empty($book->pages)?$book->pages:'(trống)'}}</dd>
                                    <dt>Khổ cỡ: </dt>
                                    <dd>{{!empty($book->size)?$book->size:'(trống)'}}</dd>
                                    <dt>Tài liệu đính kèm: </dt>
                                    <dd>{{!empty($book->attach)?$book->attach:'(trống)'}}</dd>
                                </dl>
                            <?php else: ?>
                                <dl class="dl-horizontal">
                                    <dt>Nhan đề: </dt>
                                    <dd>{{$book->title}}</dd>
                                    <dt>Số tạp chí: </dt>
                                    <dd>{{!empty($book->magazine_number)?$book->magazine_number:'(trống)'}}</dd>
                                    <dt>Ngày ra tạp chí: </dt>
                                    <dd>{{!empty($book->magazine_publish_day)?$book->magazine_publish_day:'(trống)'}}</dd>
                                    <dt>Phụ trương: </dt>
                                    <dd>{{!empty($book->magazine_additional)?$book->magazine_additional:'(trống)'}}</dd>
                                    <dt>Số đặc biệt: </dt>
                                    <dd>{{!empty($book->magazine_special)?$book->magazine_special:'(trống)'}}</dd>
                                    <dt>Khu vực: </dt>
                                    <dd>{{!empty($book->magazine_local)?$book->magazine_local:'(trống)'}}</dd>
                                </dl>
                            <?php endif; ?>

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
                        </div>
                    </div>
                </td>
                <td><?php echo $book->author ?></td>
                <td><?php echo $book->getBookTypeName() ?></td>
                <td><?php echo $book->scopeName(); ?></td>
                <td>
                    <input class="input-small" type='number' name='count' value='1'/>
                </td>
                <td>
                    <a href='javascript:void(0)' 
                       btn-confirm="confirm" 
                       data-url="{{route('fe.remove_from_cart',$book->id)}}" 
                       data-confirm="Bạn có chắc chắn muốn xóa ?"
                       class='btn btn-small btn-danger'>Xóa</a>
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
<div class="page-title">
    Danh sách tài liệu đang mượn
</div>
<div class="clear"></div>
<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Hình thức mượn</th>
            <th>Ngày mượn</th>
            <th>Hạn trả</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 1; ?>
        <?php foreach ($lendedBooks as $circulation): ?>
            <tr>
                <td><?php echo $index++ ?></td>
                <td><?php $circulation->bookItem->book->title ?></td>
                <td><?php echo $circulation->bookItem->book->getBookTypeName() ?></td>
                <td><?php echo $circulation->bookItem->book->scopeName() ?></td>
                <td><?php echo $circulation->created_at->format('d \t\h\á\n\g m, Y') ?></td>
                <td><?php echo $circulation->expired_at->format('d \t\h\á\n\g m, Y') ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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