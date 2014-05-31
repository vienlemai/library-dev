@extends('layouts.print')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            <h2>Thống kê mượn trả tài liệu</h2>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='content'>  
                    <ul>
                        <li>Tổng số tài liệu đang cho mượn: <?php echo $count['borrow'] ?></li>
                        <li>Tổng số tài liệu đã bị mất: <?php echo $count['lost'] ?></li>
                    </ul>
                    <?php
                    echo View::make('statistics.partials.circulation', array(
                        'circulations' => $circulations,
                        'timeTitle' => $timeTitle,
                        'typeTitle' => $typeTitle,
                    ))->render()

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop