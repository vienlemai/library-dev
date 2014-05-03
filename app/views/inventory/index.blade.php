@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách các lần kiểm kê
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small btn-primary' href='{{route('inventory.create')}}'>
                        <i class='i-plus-2'></i>
                        Tạo mới kiểm kê
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block table-container'>
                <div class='head'>
                    <h2>Hiển thị {{$inventories->count()}}/{{$inventories->getTotal()}} lần kiểm kê</h2>
                    <div class='toolbar-table-right'>
                        <div class='input-append'>
                            <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" data-url="{{route('inventory.search')}}">
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
                                <th style='width:5%'>TT</th>
                                <th style='width:20%'>Tiêu đề</th>
                                <th style='width:15%'>Ngày bắt đầu</th>
                                <th style='width:10%'>Ngày kết thúc</th>
                                <th style='width:10%'>Người tạo</th>
                                <th style='width:10%'>Trạng thái</th>
                                <th style='width:7%'>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = $inventories->getFrom() ?>
                            <?php foreach ($inventories as $row): ?>
                                <?php $isFinish = $row->status == Inventory::SS_FINISHED; ?>
                                <tr>
                                    <td>{{$index++}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->created_at->format('d \t\h\á\n\g m, Y').' ('.$row->created_at->diffForHumans().')'}}</td>
                                    <?php if ($isFinish): ?>
                                        <td>{{$row->end_at->format('d \t\h\á\n\g m, Y')}}</td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <td>{{$row->creator->full_name}}</td>
                                    <?php if ($isFinish): ?>
                                        <td>Đã kết thúc</td>
                                    <?php else: ?>
                                        <td style="color: red">Đang diễn ra</td>
                                    <?php endif; ?>
                                    <td>
                                        <div class='row-actions'>
                                            <?php if ($isFinish): ?>
                                                <a class='text-info' href='{{route('inventory.result',$row->id)}}'>
                                                    <i class='i-zoom-in'></i>
                                                    Xem kết quả
                                                </a>
                                            <?php else: ?>
                                                <a class='text-warning' href='{{route('inventory.execute',$row->id)}}'>
                                                    <i class='i-zoom-in'></i>
                                                    Tiếp tục
                                                </a>
                                            <?php endif; ?>
                                        </div>
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
                            {{$inventories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop