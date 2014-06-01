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
                    <ul>
                        <li>Tổng số tài liệu đang cho mượn : <?php echo $bookCount['lended_book'] - $bookCount['lost_books'] ?></li>
                        <li>Tổng số tài liệu trễ hạn : <?php echo $bookCount['expired_book'] ?></li>
                        <li>Tổng số tài liệu bị mất : <?php echo $bookCount['lost_books'] ?></li>
                    </ul>
                    <hr>
                    <h5>Thống kê theo thời gian</h5>
                    <form class="" method="GET">
                        <div class="controls-row">
                            <label class="span1">Thời gian</label>
                            <select name="time" class="span2 select2 statistics-select-time">
                                <option value="day" <?php echo $time == 'day' ? 'selected' : '' ?>>Hôm nay</option>
                                <option value="week" <?php echo $time == 'week' ? 'selected' : '' ?>>Tuần này</option>
                                <option value="month" <?php echo $time == 'month' ? 'selected' : '' ?>>Tháng này</option>
                                <option value="custom" <?php echo $time == 'custom' ? 'selected' : '' ?>>Khoảng thời gian</option>
                            </select>
                            <div class="span1"></div>
                            <label class="span1">Kiểu</label>
                            <select name="type" class="span2 select2">
                                <option value="borrow" <?php echo $type == 'borrow' ? 'selected' : '' ?>>Mượn</option>
                                <option value="return" <?php echo $type == 'return' ? 'selected' : '' ?>>Trả</option>
                            </select>
                            <button class="btn btn-primary offset1">Xem thống kê</button>
                            <a class="btn btn-success" href="{{route('statistics.circulation',array('time'=>$time,'type'=>$type,'start'=>$start,'end'=>$end,'print'=>'true'))}}" target="_blank">
                                <i class="i-printer"></i>
                                In báo cáo
                            </a>
                        </div>
                        <div class="controls-row custom-select-time" style="display: <?php echo $time == 'custom' ? 'block' : 'none' ?>">
                            <label class="span1">Từ ngày</label>
                            <input class="datepicker span2" type="text" name="start" value="<?php echo $start ?>"/>
                            <div class="span1"></div>
                            <label class="span1">Đến ngày</label>
                            <input class="datepicker span2" type="text" name="end" value="<?php echo $end ?>"/>
                        </div>
                    </form>
                    @include('partials.flash')
                    <hr>
                    <?php
                    echo View::make('statistics.partials._circulation', array(
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