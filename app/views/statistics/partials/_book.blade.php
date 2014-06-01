<div class="row-actions">
    <h4 class="text-left text-success">Danh sách tài liệu được lưu hành <?php echo $timeTitle ?></h4>
</div>
<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Số lượng</th>
            <th>Người lưu hành</th>
            <th>Ngày lưu hành</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($books as $row): ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row->title ?></td>
                <td><?php echo $row->getBookTypeName() ?></td>
                <td><?php echo $row->number ?></td>
                <td><?php echo $row->moderator->full_name ?></td>
                <td><?php echo $row->published_at->format('d/m/Y') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    