<?php $extra_times = Session::get('LibConfig.extra_times') ?>

<table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
    <thead>
        <tr>
            <th style='width:20%'>Tiêu đề</th>
            <th style='width:15%'>Ngày mượn</th>
            <th style='width:15%'>Ngày hết hạn</th>
            <th style='width:12%'>Ghi chú</th>
            <th style='width:13%'>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($circulations as $row): ?>
            <tr>
                <td>{{$row->bookItem->book->title}}</td>
                <td>{{$row->created_at->format('h:i, d \t\h\á\n\g m, Y')}}</td>
                <td>{{$row->expired_at->format('d \t\h\á\n\g m, Y')}}</td>
                <td>Còn {{ (int)$extra_times[0] - $row->extensions }} lần gia hạn</td>
                <td>
                    <div class='row-actions'>
                        <a class='text-info' href='#'>
                            <i class='i-arrow-down-6'></i>
                            Trả
                        </a>
                        <a class='text-disabled' href='#'>
                            <i class='i-plus'></i>
                            Gia hạn
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
