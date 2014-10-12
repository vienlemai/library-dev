@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class="fa fa-shopping-cart"></i>
    Giỏ sách của bạn 
</div>
<div class="clear"></div>
<div class="well-small">
    Số tài liệu đang mượn và đang đăng ký
    <ul>
        <li>Tại chỗ : <?php echo ($cirCount['local'] + $orderCount['local']) . '/' . $configs['max_book_local'] ?></li>
        <li>Về nhà : <?php echo ($cirCount['remote'] + $orderCount['remote']) . '/' . $configs['max_book_remote'] ?></li>
    </ul>
</div>
<div class="clear"></div>
<form action='{{route('fe.cart.submit')}}' method="POST" id="form-cart">
    <table class='table table-bordered table-striped' id="cart-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Hình thức mượn</th>
                <th>Số lượng</th>
                <th>Số lượng còn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0 ?>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <?php echo ++$index ?>
                        <input class="cart-input-book-id" type="hidden" name="" value="{{$book->id}}"/>
                        <input class="cart-input-book-scope" type="hidden" name="" value="{{$book->book_scope}}"/>
                    </td>
                    <td><a href="#modal-book-details-{{$book->id}}"  data-toggle='modal'><?php echo $book->title ?></a>
                        <div class="modal hide fade" id="modal-book-details-{{$book->id}}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4>Chi Tiết Tài Liệu - <?php echo $book->title ?></h4>
                            </div>
                            <div class="modal-body">
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
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $book->author ?></td>
                    <td><?php echo $book->getBookTypeName() ?></td>
                    <td><?php echo $book->scopeName(); ?></td>
                    <td>
                        <input class="input-small cart-book-count" type='number' name='count' value='1'/>
                    </td>
                    <td><?php echo $book->number - $book->lended ?></td>
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
            <a data-toggle='modal' href='#modal-confirm-clear-cart'class='btn btn-warning'><i class='fa fa-times'></i> Làm trống giỏ sách</a>
            <button class='btn btn-success' id="btn-submit-cart" ><i class='fa fa-upload'></i> Yêu cầu đặt sách</button>    
        </div>
    <?php else: ?>
        <p class='text-muted text-italic text-center'>Chưa có tài liệu nào trong giỏ!</p>
    <?php endif; ?>
</form>
<div class="modal hide fade" id='modal-confirm-clear-cart'>
    <form></form>
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