<div class="row-actions">
    <h4 class="text-left text-success">Danh sách bạn đọc <?php echo $typeTitle ?> tài liệu <?php echo $timeTitle ?></h4>
</div>
<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
    <thead>
        <tr>
            <th>#</th>
            <th>Bạn đọc</th>
            <th>Tài liệu</th>
            <th>Thể loại</th>
            <th>Hình thức mượn</th>
            <th>Người thực hiện</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($circulations as $row): ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row->reader->full_name ?></td>
                <td><?php echo $row->bookItem->book->title ?></td>
                <td><?php echo $row->bookItem->book->getBookTypeName() ?></td>
                <td><?php echo $row->bookItem->book->scopeName() ?></td>
                <td><?php echo $row->creator->full_name ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>