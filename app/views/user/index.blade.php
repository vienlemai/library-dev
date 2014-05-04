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
                <div class='head'>
                    <h2>Hiển thị {{$users->count()}}/{{$users->getTotal()}} người dùng</h2>
                    <div class='toolbar-table-right'>
                        <div class='input-append'>
                            <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" data-url="{{route('reader.search')}}">
                            <button class="btn btn-book-search" type="button">
                                <span class='icon-search'></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class='content np table-sorting'>
                    <table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
                        <thead>
                            <tr>
                                <th style='width:15%'>Họ tên</th>
                                <th style='width:10%'>Email</th>
                                <th style="width: 10%">Nhóm</th>
                                <th style='width:15%'>Ngày tạo</th>
                                <th style='width:15%'>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->group->name}}</td>
                                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        <a class='text-info' href="{{route('user.view',$user->id)}}">
                                            <i class='i-magnifier'></i>
                                            Xem
                                        </a>
                                        <a class='text-success' href="{{route('user.edit',$user->id)}}">
                                            <i class='i-pencil'></i>
                                            Sửa
                                        </a>
                                        <a class='text-error' href='{{route('user.delete',$user->id)}}' data-confirm='Bạn có chắc chắn muốn xóa nhân viên "{{$user->full_name}}"' data-method="delete" data-token="{{csrf_token()}}">
                                            <i class='i-cancel-2'></i>
                                            Xóa
                                        </a>
                                        <a class='text-warning' href="{{route('user.permission',$user->id)}}">
                                            <i class='i-magnifier'></i>
                                            Phân quyền
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <span class="loading" style="margin-left: 50px; display: none">
                        <img src="{{asset('img/loading.gif')}}"/>
                        Đang tải . . .
                    </span>
                    <div class='side fr'>
                        <div class='pagination'>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop