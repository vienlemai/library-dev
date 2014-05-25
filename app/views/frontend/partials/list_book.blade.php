<div id="books-list">
    <div class="pagination">
        <span class="disabled">&lt;&lt;</span>
        <span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">&gt;&gt;</a>
    </div>
    <div class="clearfix"></div>
    <?php foreach ($books as $book): ?>
        <div class="book-box">
            <h4 class="book-title">
                <a href="#modal-book-details-{{$book->id}}" data-toggle='modal'> <?php echo $book->title ?></a>
            </h4>
            <div class="book-description">
                <ul class="">
                    <li>Thể loại: <?php echo $book->getBookTypeName() ?></li>
                    <li>Tác giả:</li>
                    <li>Năm XB:</li>
                    <li>Quốc gia:</li>
                    <li>Trạng thái</li>
                </ul>
            </div>        
            <div class="book-foot text-muted">
                Lượt mượn: 150
            </div>
            <div class="modal hide fade" id="modal-book-details-{{$book->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Chi Tiết Tài Liệu - <?php echo $book->title ?></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Nhan đề: </dt>
                        <dd>kinh dịch diễn giải</dd>
                        <dt>Nhan đề song song: </dt>
                        <dd>(trống)</dd>
                        <dt>Tác giả: </dt>
                        <dd>nguyễn duy cần</dd>
                        <dt>Dịch giả: </dt>
                        <dd>(trống)</dd>
                        <dt>Thông tin xuất bản: </dt>
                        <dd>tái bản lần 4</dd>
                        <dt>Nhà xuất bản/Nơi xuất bản: </dt>
                        <dd>nhã nam</dd>
                        <dt>Nhà in: </dt>
                        <dd>(trống)</dd>
                        <dt>Số trang: </dt>
                        <dd>20</dd>
                        <dt>Khổ cỡ: </dt>
                        <dd>(trống)</dd>
                        <dt>Tài liệu đính kèm: </dt>
                        <dd>(trống)</dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <?php $book_already_in_cart = in_array($book->id, $books_in_cart) ?>
                    <a class='btn btn-success btn-add-to-cart <?php if ($book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.add_to_cart') ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Thêm vào giỏ</a>
                    <a class='btn btn-danger btn-remove-from-cart <?php if (!$book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.remove_from_cart') ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Xóa khỏi giỏ</a>
                    <a href='<?php echo route('fe.cart') ?>' class='btn btn-primary'> <i class='fa fa-shopping-cart'></i> Xem giỏ sách</a>
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="pagination">
        <span class="disabled">&lt;&lt;</span>
        <span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">&gt;&gt;</a>
    </div>
</div>        