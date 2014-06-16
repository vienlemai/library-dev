@extends('layouts.frontend')
@section('content')
<?php
$now = Carbon\Carbon::now();

?>
<div class="page-title">
    <i class="fa fa-check-square-o"></i> Tài liệu đã đăng ký
</div>
<div class="clear"></div>
<div class='padding-10'>
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th style='width:20%'>Tiêu đề</th>
                <th style='width:15%'>Ngày đăng ký</th>
                <th style='width:5%'>Số lượng</th>
                <th style="width:10%">Hình thức mượn</th>
                <th style='width:12%'>Trạng thái</th>
                <th style='width:8%'>Ngày hẹn</th>
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
                        <td><?php echo $order->book->title ?></td>
                        <td><?php echo $order->created_at->format('H:i, d \t\h\á\n\g m, Y') ?></td>
                        <td><?php echo $order->count ?></td>
                        <td><?php echo $order->book->scopeName() ?></td>
                        <td>
                            <?php if ($order->status == Order::SS_REJECTED): ?>
                                <a href="#order-reason-reject-{{$order->id}}" class="btn btn-small btn-danger" data-toggle='modal'>
                                    <?php echo $order->getStatusTitle() ?>
                                </a>
                                <div class="modal hide fade" id="order-reason-reject-{{$order->id}}">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4>Lý do từ chối</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $order->reason_reject ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class='fa fa-times'></i> Đóng</button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $order->getStatusTitle() ?>
                            <?php endif; ?>
                        </td>
                        <td><?php
                            if ($order->status == Order::SS_APPROVED) {
                                echo $order->pick_up_at->format('d \t\h\á\n\g m, Y');
                            }

                            ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="clear"></div>   
</div>

@stop