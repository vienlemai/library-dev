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
                    <div class='head'>
                        <h2>Thống kê nhân viên</h2>
                    </div>
                </div>
                <div class='content'>
                    <ul>
                        <li>Tổng số nhân viên: <?php echo $users->count() ?>
                            <ul>
                                <?php foreach ($userCount as $k => $v): ?>
                                    <li><?php echo $v['title'] ?>: <?php echo $v['value'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
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
                            <label class="span1">Nhân viên</label>
                            <select name="user_id" class="span2 select2">
                                <option value="-1">Tất cả</option>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?php echo $user->id ?>"><?php echo $user->full_name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary offset1">Xem thống kê</button>
                            <a href="<?php echo route('statistics.reader', array('time' => $time, 'start' => $start, 'end' => $end, 'print' => 'true')) ?>"
                               class="btn btn-success margin-10 btn-print"
                               target="_blank">
                                <i class="i-printer"></i> In báo cáo
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
                    echo View::make('statistics.partials._user', array(
                        'activities' => $activities,
                        'timeTitle' => $timeTitle,
                        'userTitle' => $userTitle,
                    ))->render()

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop