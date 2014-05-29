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
                <tr>
                    <td><?php echo $order->reader->full_name ?></td>
                    <td><?php echo $order->book->title ?></td>
                    <td><?php echo $order->count ?></td>
                    <td><?php echo $order->getStatusTitle() ?></td>
                    <td><?php echo $order->created_at->format('d \t\h\á\n\g m, Y') ?></td>
                    <td><?php
                        if ($order->status == Order::SS_APPROVED) {
                            echo $order->pick_up_at->format('d \t\h\á\n\g m, Y');
                        }

                        ?></td>
                    <td>
                        <a href="{{route('order.approve')}}" class="text-success order-action">
                            <i class="i-plus"></i>Chấp nhận
                        </a>
                        <a href="{{route('order.reject')}}" class="text-error  order-action">
                            <i class="i-cancel-2">Hủy</i>
                        </a>
                    </td>
                </tr>
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