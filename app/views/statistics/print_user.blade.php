@extends('layouts.print')
@section('currentMenu','statistics_reader')
@section('content')
<div class="wrap">
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