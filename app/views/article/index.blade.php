@extends('layouts.admin')
@section('currentMenu','readers')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách thông báo
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <div class="btn-group">
                        <a href="{{route('article.create')}}" class="btn btn-primary"><i class='i-plus-2'></i>Thêm mới thông báo</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        @include('partials.flash')	
        <div class='row-fluid'>
            <div class='block table-container'>
                <?php
                echo View::make('article.partials._list', array(
                    'articles' => $articles,
                ))->render();

                ?>
            </div>
        </div>
    </div>

</div>
@stop
