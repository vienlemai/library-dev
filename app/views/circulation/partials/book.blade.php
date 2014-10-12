<?php $isLocal = ($bookItem->book->book_scope == Book::SCOPE_LOCAL); ?>
<div class='span5'>
    <div class='content-row'>
        <input class='barcode-scanner' value="{{$bookItem->barcode}}" data-url="{{route('circulation.book')}}" placeholder='Mã tài liệu' type='text'>
    </div>
    <div class='content-row'>
        <div class='span4'>Lưu hành:</div>
        <div class='span8'>
            {{$bookItem->book->published_at->format('d \t\h\á\n\g m, Y')}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Số ĐKCB:</div>
        <div class='span8'>
            <?php echo $bookItem->dkcb ?>
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Mức độ:</div>
        <div class='span8'>
            <?php echo Book::$LEVELS[$bookItem->book->level] ?>
        </div>
    </div>
    <div class='content-row'>
        <div class='span8'><strong><?php echo $bookItem->statusLabel() ?></strong></div>
        <div class='span4'></div>
    </div>


    <?php if ($borrow): ?>
        <?php if ($isLocal): ?>
            <div class='content-row'>
                <a href="javascript:void(0)" class='btn btn-primary cir-action' id="btn-borrow-book" data-url='{{route('circulation.borrow',Book::SCOPE_LOCAL)}}'>
                    <i class='i-arrow-up-6'></i>Mượn tại chỗ
                </a>
            </div>
        <?php else: ?>
            <div class='content-row'>
                <a href="javascript:void(0)" class='btn btn-success' id="btn-borrow-book" data-url='{{route('circulation.borrow',Book::SCOPE_AWAY)}}'>
                    <i class='i-arrow-up-6'></i>Mượn
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php elseif ($return): ?>
    <div class='content-row'>
        <a href="javascript:void(0)" class='btn btn-warning cir-action' id="btn-return-book" data-url='{{route('circulation.return')}}'>
            <i class='i-arrow-down-6'></i>
            Trả
        </a>
    </div>
    <div class='content-row'>
        <a href="javascript:void(0)"  class="btn btn-danger cir-action" id="btn-lost-book" data-url="{{route('circulation.lost')}}">
            <i class="i-cancel-2"></i>
            Làm mất
        </a>
    </div>
<?php endif; ?>
<?php if ($extra && !$isLocal): ?>
    <div class='content-row'>
        <a href="javascript:void(0)" class='btn btn-success cir-action' id="btn-extra-book" data-url='{{route('circulation.extra')}}'>
            <i class='i-plus'></i>
            Gia hạn
        </a>
    </div>    
<?php endif; ?>
</div>
</div>
<div class='span7'>
    <?php if ($bookItem->book->book_scope == Book::SCOPE_LOCAL): ?>
        <div class="alert alert-block">
            Tài liệu này chỉ được phép mượn tại chỗ, trả trong ngày
            <button data-dismiss="alert" class="close" type="button">×</button>
        </div>
    <?php endif; ?>
    <?php if ($bookItem->book->isBook()): ?>
        <table class="table">
            <tr>
                <td>Nhan đề</td>
                <td><strong>{{$bookItem->book->title}}</strong></td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td>Sách</td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>{{$bookItem->book->author}}</td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>{{$bookItem->book->publisher}}</td>
            </tr>
            <tr>
                <td>Ngôn ngữ</td>
                <td>{{$bookItem->book->language}}</td>
            </tr>
            <tr>
                <td>Kho</td>
                <td><?php echo Storage::fullSupperRoot($bookItem->book->id) ?></td>
            </tr>
            <tr>
                <td>Số trang</td>
                <td>{{$bookItem->book->pages}}</td>
            </tr>
            <tr>
                <td>Kích thước</td>
                <td>{{$bookItem->book->size}}</td>
            </tr>
            <tr>
                <td>Phạm vi mượn</td>
                <td>{{$bookItem->book->permissionName()}}</td>
            </tr>

        </table>
    <?php else: ?>
        <table class="table table-bordered">
            <tr>
                <td>Nhan đề</td>
                <td>{{$bookItem->book->title}}</td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td>Tạp chí/Biểu mẫu</td>
            </tr>
            <tr>
                <td>Số tạp chí</td>
                <td>{{$bookItem->book->magazine_number}}</td>
            </tr>
            <tr>
                <td>Ngày ra tạp chí</td>
                <td>{{$bookItem->book->magazine_publish_day}}</td>
            </tr>
            <tr>
                <td>Phụ trương</td>
                <td>{{$bookItem->book->magazine_additional}}</td>
            </tr>
            <tr>
                <td>Số đặc biệt</td>
                <td>{{$bookItem->book->magazine_special}}</td>
            </tr>
            <tr>
                <td>Khu vực</td>
                <td>{{$bookItem->book->magazine_local}}</td>
            </tr>
            <tr>
                <td>Phạm vi mượn</td>
                <td>{{$bookItem->book->permissionName()}}</td>
            </tr>
        </table>
    <?php endif; ?>

</div>