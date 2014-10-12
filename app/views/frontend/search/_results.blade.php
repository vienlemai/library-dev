<div id="books-list">
    <div class="clearfix"></div>
    <?php foreach ($books as $book): ?>
        <div class="book-row">
            <ul>
                <li>
                    <?php if ($book->isBook()): ?>
                        <a href="#modal-book-details-{{$book->id}}" data-toggle='modal'> <?php echo $book->title ?> - <?php echo $book->magazine_number ?></a>
                        - {{$book->magazine_publish_day}} / {{ $book->magazine_additional }}, {{ $book->magazine_special }} ({{$book->magazine_local}})
                    <?php else: ?>
                        <a href="#modal-book-details-{{$book->id}}" data-toggle='modal'> <?php echo $book->title ?> - <?php echo $book->author ?></a>
                    <?php endif; ?>
                    <ul class="">
                        <li>Kho: {{$book->kho->name or ''}} </li>
                        <li>Đối tượng mượn: {{$book->permissionName()}}</li>
                    </ul>
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
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Nhan đề</td>
                                        <td>{{$book->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nhan đề song song</td>
                                        <td>{{$book->sub_title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tác giả</td>
                                        <td>{{$book->author}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dịch giả</td>
                                        <td>{{$book->translator}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nơi xuất bản/Nhà xuất bản</td>
                                        <td>{{$book->publisher}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nhà in</td>
                                        <td>{{$book->printer}}</td>
                                    </tr>
                                    <tr>
                                        <td>Số trang</td>
                                        <td>{{$book->pages}}</td>
                                    </tr>
                                    <tr>
                                        <td>Khổ cỡ</td>
                                        <td>{{$book->size}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tài liệu đính kèm</td>
                                        <td>{{$book->attach}}</td>
                                    </tr>
                                </table>
                            <?php else: ?>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Nhan đề</td>
                                        <td>{{$book->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Số tạp chí</td>
                                        <td>{{$book->magazine_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày ra tạp chí</td>
                                        <td>{{$book->magazine_publish_day}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phụ trương</td>
                                        <td>{{$book->magazine_additional}}</td>
                                    </tr>
                                    <tr>
                                        <td>Số đặc biệt</td>
                                        <td>{{$book->magazine_special}}</td>
                                    </tr>
                                    <tr>
                                        <td>Khu vực</td>
                                        <td>{{$book->magazine_local}}</td>
                                    </tr>
                                </table>
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
                </li>
            </ul>
        </div>
    <?php endforeach; ?>


</div>      
<div class="clearfix"></div>