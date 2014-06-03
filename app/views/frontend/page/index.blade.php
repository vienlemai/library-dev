@extends('layouts.frontend')
@section('content')
<div id="left-sidebar">
    <div class="sidebar-box">
        <h4><i class="fa fa-spinner"></i> Tài liệu mới nhất</h4>
        <ul>
            <?php foreach ($newest_books as $book) : ?>
                <li>
                    <a href="#modal-newest-book-details-{{$book->id}}" data-toggle='modal' ><?php echo ucfirst($book->title) ?></a>
                    <div class="modal hide fade" id="modal-newest-book-details-{{$book->id}}">
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
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="sidebar-box">
        <h4><i class="fa fa-star"></i> Tài liệu mượn nhiều</h4>
        <ul>
            <?php foreach ($top_books as $book) : ?>
                <li>
                    <a href="#modal-top-book-details-{{$book->id}}" data-toggle='modal'><?php echo ucfirst($book->title) ?></a>
                    <div class="modal hide fade" id="modal-top-book-details-{{$book->id}}">
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
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div> 
<!-- End side bar-->

<div id="index-content-wrap">
    <div class="section">
        <div class="section-title">
            <h4><i class="fa fa-bullhorn"></i> Tin tức / Thông báo</h4>
        </div>
        <div class="section-content articles">
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <div class="article-title">
                        <h4><?php echo $article->title ?></h4>
                        <span class="timestamp text-muted"><?php echo date('m/d/Y - H:i', strtotime($article->created_at)) ?></span>
                    </div>
                    <div class="article-content">
                        <?php echo truncate(strip_tags($article->content), 100) ?>
                    </div>
                    <a href="<?php echo route('fe.article_details', $article->id) ?>" class="read-more">>> Đọc thêm</a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="section">
        <div class="section-title">
            <h4 class="inline"><i class="fa fa-book"></i> Tài liệu thư viện</h4>
            <div id="search-box">
                <form action="<?php echo route('fe.search') ?>" class="form-horizontal" method='GET'>          
                    <input type="text"  name="keyword" placeholder="Nhập tiêu đề tài liệu để tìm kiếm . . ." style="width: 380px">
                    <button type='submit' class='btn'><i class='fa fa-search'></i></button>
                </form>
            </div>
        </div>
        <div class="section-content articles">
            <?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
        </div>
    </div>
</div>


@stop