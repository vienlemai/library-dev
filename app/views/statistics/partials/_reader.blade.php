<div class="row-actions">
    <h4 class="text-left text-success">Danh sách bạn đọc được tạo mới <?php echo $timeTitle ?></h4>
</div>
<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
    <thead>
        <tr>
            <th>#</th>
            <th>Họ tên</th>
            <th>Số thẻ</th>
            <th>Phân quyền</th>
            <th>Ngày tạo</th>
            <th>Người tạo</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($readers as $row): ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row->full_name ?></td>
                <td><?php echo $row->card_number ?></td>
                <td><?php echo Reader::$TYPE_LABELS[$row->reader_type] ?></td>
                <td><?php echo $row->created_at->format('d/m/Y') ?></td>
                <td><?php echo $row->creator->full_name ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
