<?php if ($bookItem->book->isBook()): ?>
    <table class="table table-bordered">
        <tr width="30%">
            <td>Thể loại</td>
            <td>Sách</td>
        </tr>
        <tr>
            <td>Số ĐKCB</td>
            <td><?php echo $bookItem->dkcb ?></td>
        </tr>
        <tr>
            <td>Nhan đề</td>
            <td>{{$bookItem->book->title}}</td>
        </tr>
        <tr>
            <td>Nhan đề song song</td>
            <td>{{$bookItem->book->sub_title}}</td>
        </tr>
        <tr>
            <td>Tác giả</td>
            <td><?php echo $bookItem->book->author ?></td>
        </tr>
        <tr>
            <td>Dịch giả</td>
            <td><?php echo $bookItem->book->translator ?></td>
        </tr>
        <tr>
            <td>Nơi xuất bản/Nhà xuất bản</td>
            <td><?php echo $bookItem->book->publisher ?></td>
        </tr>
        <tr>
            <td>Nhà in</td>
            <td><?php echo $bookItem->book->printer ?></td>
        </tr>
        <tr>
            <td>Số trang</td>
            <td><?php echo $bookItem->book->pages ?></td>
        </tr>
        <tr>
            <td>Khổ cỡ</td>
            <td><?php echo $bookItem->book->size ?></td>
        </tr>

    </table>
<?php else: ?>
    <table class="table table-bordered">
        <tr>
            <td>Thể loại</td>
            <td>Tạp chí/Biểu mẫu</td>
        </tr>
        <tr>
            <td>Số ĐKCB</td>
            <td><?php echo $bookItem->dkcb ?></td>
        </tr>
        <tr>
            <td>Nhan đề</td>
            <td>{{$bookItem->book->title}}</td>
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
    </table>
<?php endif; ?>
