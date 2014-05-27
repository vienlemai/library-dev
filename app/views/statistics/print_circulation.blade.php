@extends('layouts.print')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thống kê mượn trả tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='content'>  
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