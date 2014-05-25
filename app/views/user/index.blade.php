@extends('layouts.admin')
@section('currentMenu','readers')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách nhân viên
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small btn-primary' href='{{route('user.create')}}'>
                        <i class='i-plus-2'></i>
                        Thêm mới nhân viên
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            @include('partials.flash')
            <div class='block table-container'>
                <?php echo View::make('user.partials.index', array('users' => $users)) ?>
            </div>
        </div>
    </div>

</div>
@stop
