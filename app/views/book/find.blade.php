@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Tra cứu tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Tra cứu tài liệu</h2>
                </div>
                <div class='content'>
                    <h5>Nhập mã vạch hoặc số ĐKCB</h5>
                    <form class="" method="GET" id="form-find-book">
                        <div class="controls-row">
                            <input class="form-control" id="input-find-book" type="text" name="keyword" value="<?php echo Input::get('keyword', '') ?>"/>
                            <button class="btn btn-primary offset1">Tra cứu</button>
                        </div>
                    </form>                    
                    @include('partials.flash')
                    <hr>
                    <?php if (empty($bookItems) || $bookItems->isEmpty()): ?>
                        <div class="alert alert-danger">Không tìm thấy tài liệu nào</div>
                    <?php endif ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã vạch</th>
                            <th>Số ĐKCB</th>
                            <th>Tên tài liệu</th>
                            <th>Số phân loại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        <tbody>
                            <?php foreach ($bookItems as $bookItem): ?>
                                <tr>
                                    <td><?php echo $bookItem->barcode; ?></td>
                                    <td><?php echo $bookItem->dkcb ?></td>
                                    <td><?php echo $bookItem->book->title ?></td>
                                    <td><?php echo $bookItem->book->type_number ?></td>
                                    <td><?php echo $bookItem->statusLabel() ?></td>
                                    <td><a href="#modal-book-details-{{$bookItem->id}}" data-toggle="modal">Xem chi tiết</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('extra_html')
<?php foreach ($bookItems as $bookItem): ?>
    <div class="modal hide fade" id="modal-book-details-{{$bookItem->id}}">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Chi Tiết Tài Liệu - <?php echo $bookItem->book->title ?></h4>
        </div>
        <div class="modal-body">
            <h4>Trạng thái: <strong><?php echo $bookItem->statusLabel(); ?></strong></h4>
            <?php if ($bookItem->status == BookItem::SS_LOST_BY_INVENTORY || $bookItem->status == BookItem::SS_LOST_BY_READER) : ?>
                <h5>Lý do:</h5>
                <div class="alert alert-danger">
                    <?php echo $bookItem->lost->reason; ?>;
                </div>
            <?php endif; ?>
            <?php if ($bookItem->book->isBook()): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Số ĐKCB</td>
                        <td><?php echo $bookItem->dkcb; ?></td>
                    </tr>
                    <tr>
                        <td>Thể loại</td>
                        <td>Sách</td>
                    </tr>
                    <tr>
                        <td>Nhan đề</td>
                        <td>{{ $bookItem->book->title}}</td>
                    </tr>
                    <tr>
                        <td>Nhan đề song song</td>
                        <td>{{ $bookItem->book->sub_title}}</td>
                    </tr>
                    <tr>
                        <td>Tác giả</td>
                        <td>{{ $bookItem->book->author}}</td>
                    </tr>
                    <tr>
                        <td>Dịch giả</td>
                        <td>{{ $bookItem->book->translator}}</td>
                    </tr>
                    <tr>
                        <td>Nơi xuất bản/Nhà xuất bản</td>
                        <td>{{ $bookItem->book->publisher}}</td>
                    </tr>
                    <tr>
                        <td>Nhà in</td>
                        <td>{{ $bookItem->book->printer}}</td>
                    </tr>
                    <tr>
                        <td>Số trang</td>
                        <td>{{ $bookItem->book->pages}}</td>
                    </tr>
                    <tr>
                        <td>Khổ cỡ</td>
                        <td>{{ $bookItem->book->size}}</td>
                    </tr>
                    <tr>
                        <td>Tài liệu đính kèm</td>
                        <td>{{ $bookItem->book->attach}}</td>
                    </tr>
                </table>
            <?php else: ?>
                <table class="table table-bordered table-striped">
                    <tr>
                    <tr>
                        <td>Thể loại</td>
                        <td>Tạp chí/Biểu mẫu</td>
                    </tr>
                    <td>Nhan đề</td>
                    <td>{{ $bookItem->book->title}}</td>
                    </tr>
                    <tr>
                        <td>Số tạp chí</td>
                        <td>{{ $bookItem->book->magazine_number}}</td>
                    </tr>
                    <tr>
                        <td>Ngày ra tạp chí</td>
                        <td>{{ $bookItem->book->magazine_publish_day}}</td>
                    </tr>
                    <tr>
                        <td>Phụ trương</td>
                        <td>{{ $bookItem->book->magazine_additional}}</td>
                    </tr>
                    <tr>
                        <td>Số đặc biệt</td>
                        <td>{{ $bookItem->book->magazine_special}}</td>
                    </tr>
                    <tr>
                        <td>Khu vực</td>
                        <td>{{ $bookItem->book->magazine_local}}</td>
                    </tr>
                </table>
            <?php endif; ?>

        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
        </div>
    </div>
<?php endforeach; ?>
@stop