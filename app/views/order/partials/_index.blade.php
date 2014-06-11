<div class="head">
    <h2>Hiển thị {{$orders->count()}}/{{$orders->getTotal()}} tài liệu</h2>
</div>
<div class="content">
    <table cellpadding='0' cellspacing='0' class='table table-bordered table-striped' width='100%'>
        <thead>
            <tr>
                <th>Bạn đọc</th>
                <th>Tài liệu</th>
                <th width="7%">Số lượng</th>
                <th>Trạng thái</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hẹn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <?php
                $now = Carbon\Carbon::now();
                $isNotShow = (($order->pick_up_at !== null && $now->gt($order->pick_up_at)) || ($order->status == Order::SS_REJECTED && $now->diffInDays($order->created_at) > 3));

                ?>
                <?php if (!$isNotShow) : ?>
                    <?php
                    switch ($order->status) {
                        case Order::SS_NEW:
                            $class = 'text-info';
                            break;
                        case Order::SS_APPROVED:
                            $class = 'text-success';
                            break;
                        case Order::SS_REJECTED:
                            $class = 'text-error';
                            break;
                    }

                    ?>
                    <tr class="<?php echo $class ?>">
                        <td><?php echo $order->reader->full_name ?></td>
                        <td>
                            <a href="javascript:void(0)" data-modal="show-modal" data-url='{{route('book.library.view',$order->book->id)}}'>
                                <i class='i-magnifier'></i>
                                <?php echo $order->book->title ?>
                            </a>
                        </td>
                        <td><?php echo $order->count ?></td>
                        <td><?php echo $order->getStatusTitle() ?></td>
                        <td><?php echo $order->created_at->format('d \t\h\á\n\g m, Y') ?></td>
                        <td><?php
                            if ($order->status == Order::SS_APPROVED) {
                                echo $order->pick_up_at->format('d \t\h\á\n\g m, Y');
                            }

                            ?></td>
                        <td>
                            <?php if ($order->status == Order::SS_NEW): ?>
                                <a href="javascript:void(0)" data-id="{{$order->id}}" class="text-success order-action-approve">
                                    <i class="i-plus"></i>Chấp nhận
                                </a>
                                <a href="javascript:void(0)"  data-id="{{$order->id}}" class="text-error order-action-reject">
                                    <i class="i-cancel-2">Từ chối</i>
                                </a>
                            <?php else: ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="footer">
    <div class='side'>
        <div class="fr">
            <div class='pagination'>
                {{$orders->links()}}
            </div>
        </div>        
    </div>
</div>