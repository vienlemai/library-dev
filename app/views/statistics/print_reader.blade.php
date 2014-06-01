@extends('layouts.print')
@section('currentMenu','statistics_reader')
@section('content')
<div class="wrap">
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <div class='head'>
                        <h2>Thống kê bạn đọc</h2>
                    </div>
                </div>
                <div class='content'>
                    <ul>
                        <li>Tổng số bạn đọc: <?php echo $readerCount['all'] ?>
                            <ul>
                                <li>Đang lưu thông: <?php echo $readerCount['all'] - $readerCount['expired'] - $readerCount['paused'] ?></li>
                                <li>Đang hết hạn : <?php echo $readerCount['expired'] ?></li>
                                <li>Đang bị khóa : <?php echo $readerCount['paused'] ?></li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <?php
                    echo View::make('statistics.partials._reader', array(
                        'readers' => $readers,
                        'timeTitle' => $timeTitle,
                    ))->render()

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop