<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: block; width: 80%;margin-left: -40%">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Lịch sử lưu thông</h3>
    </div>
    <div class="modal-body">
        <h4 class="text-center">Bạn đọc: {{$reader->full_name}}</h4>
        <?php
        $max_extra_times = $configs['extra_times'];
        $now = Carbon\Carbon::now();

        ?>
        <table cellpadding='0' cellspacing='0' class='table table-bordered sort' width='100%'>
            <thead>
                <tr>
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
                        <?php if ($row->returned == 1): ?>
                            <td style="text-decoration: line-through">{{$row->bookItem->book->title}}</td>
                        <?php elseif ($isExpired): ?>
                            <td style="color: red">{{$row->bookItem->book->title}}</td>
                        <?php else: ?>
                            <td>{{$row->bookItem->book->title}}</td>
                        <?php endif; ?>

                        <td>{{$row->created_at->format('d \t\h\á\n\g m, Y')}}</td>
                        <?php if (!$isExpired || $row->returned == 1): ?>
                            <td>
                                <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') ?>
                            </td>
                        <?php else: ?>
                            <td style="color: red">
                                <?php $diff = $now->diffInDays($row->expired_at); ?>
                                <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') . ' (trễ ' . $diff . ' ngày)'; ?>
                            </td>
                        <?php endif; ?>
                        <?php if ($row->is_lost): ?>
                            <td style="color: red">Làm mất</td>
                        <?php elseif ($row->returned == 1): ?>
                            <td>Đã trả</td>
                        <?php elseif (!$isExpired): ?>
                            <?php if ($row->bookItem->book->book_scope == Book::SCOPE_LOCAL): ?>
                                <td>Mượn tại chỗ</td>
                            <?php else: ?>
                                <td><?php echo $ex_times > 0 ? 'Còn ' . $ex_times . ' lần gia hạn' : 'Hết quyền gia hạn' ?></td>
                            <?php endif; ?>

                        <?php else: ?>
                            <td style="color: red">
                                <?php $book_expired_fine = $configs['book_expired_fine']; ?>
                                <?php echo 'Tiền phạt : ' . $diff * $book_expired_fine . ' (đồng)' ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>            
    </div>
</div>