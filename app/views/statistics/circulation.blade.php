@extends('layouts.admin')
@section('currentMenu','statistics_reader')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thống kê
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thống kê mượn trả tài liệu</h2>
                </div>
                <div class='content'>
                    <form class="" method="GET">
                        <div class="controls-row">
                            <label class="span1">Thời gian</label>
                            <select name="time" class="span2">
                                <option value="day" <?php echo $time == 'day' ? 'selected' : '' ?>>Hôm nay</option>
                                <option value="week" <?php echo $time == 'week' ? 'selected' : '' ?>>Tuần này</option>
                                <option value="month" <?php echo $time == 'month' ? 'selected' : '' ?>>Tháng này</option>
                            </select>
                            <div class="span1"></div>
                            <label class="span1">Kiểu</label>
                            <select name="type" class="span2">
                                <option value="borrow" <?php echo $type == 'borrow' ? 'selected' : '' ?>>Mượn</option>
                                <option value="return" <?php echo $type == 'return' ? 'selected' : '' ?>>Trả</option>
                            </select>
                            <button class="btn btn-primary offset1">Xem thống kê</button>
                        </div>
                    </form>
                    <hr>
                    <?php
                    echo View::make('statistics.partials.circulation', array(
                        'circulations' => $circulations,
                        'timeTitle' => $timeTitle,
                        'typeTitle' => $typeTitle,
                    ))->render()

                    ?>
                    <div class="content-row">
                        <a class="btn btn-primary" href="{{route('statistics.print.circulation',array('time'=>$time,'type'=>$type))}}" target="_blank">
                            <i class="i-printer"></i>
                            In báo cáo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop