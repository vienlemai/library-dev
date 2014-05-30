@extends('layouts.frontend')
@section('content')
<?php
$now = Carbon\Carbon::now();
?>
<div class="page-title">
    <i class="fa fa-book"></i> Tài liệu đang mượn
</div>

<div class="clear margin-10"></div>
<div class="clear"></div>
<div class='padding-10'>
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th style='width:20%'>Tiêu đề</th>
                <th style='width:13%'>Ngày mượn</th>
                <th style='width:13%'>Hết hạn</th>
                <th style='width:12%'>Ghi chú</th>
                <th style='width:8%'>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($borrowing_books as $row): ?>
                <?php
                $ex_times = (int) $extra_times - $row->extensions;
                $isExpired = $row->expired_at->lt($now) && ($now->diffInDays($row->expired_at) > 0);
                $isLocal = $row->bookItem->book->book_scope == Book::SCOPE_LOCAL;
                ?>
                <tr>
                    <td>{{$row->bookItem->book->title}}</td>
                    <td>{{$row->created_at->format('d \t\h\á\n\g m, Y')}}</td>
                    <?php if (!$isExpired): ?>
                        <td>
                            <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y') ?>
                        </td>
                    <?php else: ?>
                        <td class="text-error">
                            <?php $diff = $now->diffInDays($row->expired_at); ?>
                            <?php echo $row->expired_at->format('d \t\h\á\n\g m, Y'); ?>
                            <br>
                            <?php echo ' Trễ ' . ($diff) . ' ngày' ?>
                        </td>
                    <?php endif; ?>
                    <?php if (!$isExpired): ?>
                        <?php if ($isLocal): ?>
                            <td>Mượn tại chỗ</td>
                        <?php else: ?>
                            <td><?php echo $ex_times > 0 ? 'Còn ' . $ex_times . ' lần gia hạn' : 'Hết quyền gia hạn' ?></td>
                        <?php endif; ?>

                    <?php else: ?>
                        <td class="text-error">
                            <?php echo 'Tiền phạt : ' . ($diff) * $book_expired_fine . ' (đồng)' ?>
                        </td>
                    <?php endif; ?>                    
                    <td class="text-center">
                        <?php if (!$isExpired && !$isLocal && $ex_times): ?>
                            <a href="{{route('fe.extra',$row->id)}}" class="btn btn-success btn-small np">Gia hạn</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="clear"></div>
</div>

@stop