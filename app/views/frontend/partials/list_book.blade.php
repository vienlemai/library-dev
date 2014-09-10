<div id="books-list">
    <?php
    $show_paging = (int) ($books->getTotal() / $books->getPerPage()) > 0 ? true : false;
    ?>
    <div class="clearfix"></div>
    <?php foreach ($books as $book): ?>
        <div class="book-box">
            <h4 class="book-title">
                <a href="#modal-book-details-{{$book->id}}" data-toggle='modal'> <?php echo $book->title ?></a>
            </h4>
            <div class="book-description">
                <ul class="">
                    <li>Thể loại: <?php echo $book->getBookTypeName(); ?></li>
                    <li>Mức độ: <?php echo $book->getLevelName(); ?></li>
                    <li>Phạm vi mượn : <?php echo $book->scopeName(); ?> </li>
                    <li>Số lượng: <?php echo $book->number - $book->lended . '/' . $book->number ?></li>
                </ul>
                <div class="book-foot text-muted">
                    <a href="#modal-book-details-{{$book->id}}"  data-toggle='modal'>Chi tiết</a>
                </div>
            </div>  
            <div class="modal hide fade" id="modal-book-details-{{$book->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Chi Tiết Tài Liệu - <?php echo $book->title ?></h4>
                </div>
                <div class="modal-body">
                    <?php if (!Auth::check()): ?>
                        <div class="alert alert-error">
                            Bạn cần <a href="{{route('fe.login')}}">Đăng nhập</a> để đăng ký mượn tài liệu
                        </div>
                    <?php endif; ?>
                    <?php if ($book->isBook()): ?>
                        <dl class="dl-horizontal">
                            <dt>Nhan đề song song: </dt>
                            <dd>{{!empty($book->sub_title)?$book->sub_title:'(trống)'}}</dd>
                            <dt>Tác giả: </dt>
                            <dd>{{$book->author}}</dd>
                            <dt>Dịch giả: </dt>
                            <dd>{{!empty($book->translator)?$book->translator:'(trống)'}}</dd>
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
                    <?php if (Auth::check()): ?>
                        <?php $book_already_in_cart = in_array($book->id, $books_in_cart) ?>
                        <a class='btn btn-success btn-add-to-cart <?php if ($book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.add_to_cart') ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Thêm vào giỏ</a>
                        <a class='btn btn-danger btn-remove-from-cart <?php if (!$book_already_in_cart) echo 'hide' ?>' data-url='<?php echo route('fe.remove_from_cart', $book->id) ?>' data-book-id='<?php echo $book->id ?>' href='javascript:void(0)'>Xóa khỏi giỏ</a>
                        <a href='<?php echo route('fe.cart') ?>' class='btn btn-primary'> <i class='fa fa-shopping-cart'></i> Xem giỏ sách</a>
                    <?php endif; ?>
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if ($books->count() == 0) : ?>
        <p class="text-center">Không tìm thấy tài liệu nào!</p>
    <?php endif; ?>
    <div class="clearfix"></div>
    <?php if ($show_paging) : ?>
        <div class='pagination'>
            {{$books->links()}}
        </div>
    <?php endif; ?>

</div>      
<div class="clearfix"></div>