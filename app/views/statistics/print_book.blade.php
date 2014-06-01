@extends('layouts.print')
@section('currentMenu','statistics_book')
@section('content')
<div class="wrap">
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thống kê tài liệu</h2>
                </div>
                <div class='content'>
                    <ul>
                        <li>Tổng tài liệu đang lưu hành: <?php echo $bookCount['publish_books'] + $bookCount['publish_magazines'] - $bookCount['lost_books'] ?>
                            <ul>
                                <li>Sách : <?php echo $bookCount['publish_books'] ?></li>
                                <li>Tạp chí/biểu mẫu : <?php echo $bookCount['publish_magazines'] ?></li>
                                <?php foreach ($bookCount['storage'] as $bookByStorage): ?>
                                    <li><?php echo $bookByStorage['storageName'] . ': ' . $bookByStorage['count'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <?php
                    echo View::make('statistics.partials._book', array(
                        'books' => $books,
                        'timeTitle' => $timeTitle,
                    ))->render()

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop