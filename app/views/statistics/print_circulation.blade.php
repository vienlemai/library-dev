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
                        <li>Tổng số tài liệu đang cho mượn : <?php echo $bookCount['lended_book'] - $bookCount['lost_books'] ?></li>
                        <li>Tổng số tài liệu trễ hạn : <?php echo $bookCount['expired_book'] ?></li>
                        <li>Tổng số tài liệu bị mất : <?php echo $bookCount['lost_books'] ?></li>
                    </ul>
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