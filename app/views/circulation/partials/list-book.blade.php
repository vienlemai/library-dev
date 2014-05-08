<?php
$max_extra_times = Session::get('LibConfig.extra_times');
$now = Carbon\Carbon::now();

?>
<?php if (isset($message)): ?>
    <div class="alert alert-success">
        <?php echo $message ?>
        <button data-dismiss="alert" class="close" type="button">×</button>
    </div>
<?php endif; ?>
<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
    <thead>
        <tr>
            <th style='width:7%'>Mã vạch</th>
            <th style='width:20%'>Tiêu đề</th>
            <th style='width:10%'>Ngày mượn</th>
            <th style='width:15%'>Hết hạn</th>
            <th style='width:12%'>Ghi chú</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($circulations as $row): ?>
            <?php
            $ex_times = (int) $max_extra_times - $row->extensions;
            $isExpired = $row->expired_at->lt($now) && ($now->diffInDays($row->expired_at) > 0);

            ?>
            <tr>
                <td>{{$row->bookItem->barcode}}</td>
                <td>{{$row->bookItem->book->title}}</td>
                <td>{{$row->created_at->format('d \t\h\á\n\g m, Y')}}</td>
                    <?php if (!$isExpired): ?>
                    <td>
                    <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') ?>
                    </td>
                    <?php else: ?>
                    <td style="color: red">
                        <?php $diff = $now->diffInDays($row->expired_at); ?>
                    <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') . ' (trễ ' . ($diff) . ' ngày)'; ?>
                    </td>
                <?php endif; ?>
                <?php if (!$isExpired): ?>
                    <?php if ($row->bookItem->book->book_scope == Book::SCOPE_LOCAL): ?>
                        <td>Mượn tại chỗ</td>
                    <?php else: ?>
                        <td><?php echo $ex_times > 0 ? 'Còn ' . $ex_times . ' lần gia hạn' : 'Hết quyền gia hạn' ?></td>
                    <?php endif; ?>

                    <?php else: ?>
                    <td style="color: red">
                        <?php $book_expired_fine = Session::get('LibConfig.book_expired_fine'); ?>
                    <?php echo 'Tiền phạt : ' . ($diff) * $book_expired_fine . ' (đồng)' ?>
                    </td>
            <?php endif; ?>
            </tr>
<?php endforeach; ?>
    </tbody>
</table>
