@extends('layouts.admin')
@section('currentMenu','readers')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách bạn đọc
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <div class="btn-group">
                        <button class="btn btn-primary"><i class='i-plus-2'></i>Thêm mới bạn đọc</button>
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('reader.create',Reader::TYPE_STUDENT)}}">Học viên</a></li>
                            <li><a href="{{route('reader.create',Reader::TYPE_TEACHER)}}">Giáo viên</a></li>
                            <li><a href="{{route('reader.create',Reader::TYPE_STAFF)}}">Nhân viên</a></li>
                        </ul>                                                    
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span7'>
                <div class='block'>
                    <div class='content closed'>
                        <ul class='boxes nmt'>
                            <li>
                                <div class='text-info'>
                                    <?php echo $count[Reader::SS_CIRCULATED] + $count[Reader::SS_PAUSED] ?>
                                    <span>Tất cả</span>
                                </div>
                            </li>
                            <li>
                                <div class='text-success'>
                                    <?php echo $count[Reader::SS_CIRCULATED] ?>
                                    <span><?php echo Reader::$LABELS[Reader::SS_CIRCULATED] ?></span>
                                </div>
                            </li>							
                            <li>
                                <div class='text-error'>
                                    <?php echo $count[Reader::SS_PAUSED] ?>
                                    <span><?php echo Reader::$LABELS[Reader::SS_PAUSED] ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.flash')	
        <div class='row-fluid'>
            <div class='block table-container'>
                <div class='head'>
                    <h2>Hiển thị {{$readers->count()}}/{{$readers->getTotal()}} bạn đọc</h2>
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
                                <th style='width:5%'>
                                    <input class='checkall' type='checkbox'>
                                </th>
                                <th style='width:10%'>Mã thẻ</th>
                                <th style='width:20%'>Họ tên</th>
                                <th style='width:10%'>Loại bạn đọc</th>
                                <th style='width:15%'>Ngày đăng ký</th>
                                <th style='width:20%'>Tình trạng</th>
                                <th style='width:10%'>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="{{route('reader.cards')}}" method="POST" class="form-check">
                            {{Form::token()}}
                            <?php foreach ($readers as $reader): ?>
                                <tr>
                                    <td>
                                        <input name="readerId[]" value="{{$reader->id}}" class="checkitem" type='checkbox'>
                                    </td>
                                    <td>{{$reader->barcode}}</td>
                                    <td>{{$reader->full_name}}</td>
                                    <td>{{Reader::$TYPE_LABELS[$reader->reader_type]}}</td>
                                    <td>{{$reader->created_at->format('d/m/Y')}}</td>
                                    <?php if ($reader->status != Reader::SS_CIRCULATED): ?>
                                        <td style="color: red;text-decoration: line-through">{{Reader::$LABELS[$reader->status]}}</td>
                                    <?php else: ?>
                                        <td style="color: green">{{Reader::$LABELS[$reader->status]}}</td>
                                    <?php endif; ?>
                                    <td>
                                        <a class='text-info' href="{{route('reader.view',$reader->id)}}">
                                            <i class='i-magnifier'></i>
                                            Xem
                                        </a>
                                        <a class='text-warning' href="{{route('reader.edit',$reader->id)}}">
                                            <i class='i-pencil'></i>
                                            Sửa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </form>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <div class="side">
                        <button class="btn btn-primary btn-check-submit" data-url="{{route('reader.cards')}}">Tạo thẻ</button>
                        <span class="check-info" style="display: none"></span>
                        <div class='side fr'>
                            <div class='pagination'>
                                {{$readers->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
