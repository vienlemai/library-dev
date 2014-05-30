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
                <th style="width: 10%">Hình thức mượn</th>
                <th style='width:12%'>Trạng thái</th>
                <th style='width:8%'>Ngày hẹn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
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
                    <td><?php echo $order->getStatusTitle() ?></td>
                    <td><?php
                        if ($order->status == Order::SS_APPROVED) {
                            echo $order->pick_up_at->format('d \t\h\á\n\g m, Y');
                        }

                        ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="clear"></div>   
</div>

@stop