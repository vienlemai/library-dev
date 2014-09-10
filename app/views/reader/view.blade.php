@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thêm mới bạn đọc
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('readers')}}'>
                        <i class='i-reply'></i>
                        Danh sách bạn đọc
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thông bạn đọc</h2>
                </div>
                <div class='content'>
                    <div class="span5">
                        <img class="image-preview reader-avatar offset4" src="<?php echo asset($reader->avatar) ?>" width="100" height="100"/>
                        <h4>Thông tin kiểm soát</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>Loại bạn đọc</td>
                                <td>{{Reader::$TYPE_LABELS[$reader->reader_type]}}</td>
                            </tr>
                            <tr>
                                <td>Mã bạn đọc</td>
                                <td>{{$reader->card_number}}</td>
                            </tr>
                            <tr>
                                <td>Ngày tạo</td>
                                <td>{{$reader->created_at->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Ngày hết hạn</td>
                                <td>{{$reader->expired_at->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Người tạo</td>
                                <td>{{$reader->creator->full_name }}</td>
                            </tr>
                            <?php if ($reader->expired): ?>
                                <tr style="color: red">
                                    <td>Trạng thái</td>
                                    <td>Hết hạn ({{$reader->status->expired_at->diffForHumans()}})</td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td>{{Reader::$SS_LABELS[$reader->status]}}</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div class="span7">
                        <h4>Thông tin chi tiết</h4>
                        <?php
                        if ($reader->isStudent()) {
                            echo View::make('reader.partials.view_student', array('reader' => $reader));
                        } else if ($reader->isStaff()) {
                            echo View::make('reader.partials.view_staff', array('reader' => $reader));
                        } else {
                            echo View::make('reader.partials.view_teacher', array('reader' => $reader));
                        }

                        ?>
                        <div class="form-actions">
                            <a class="btn btn-primary" target="_blank" href="{{route('reader.card',$reader->id)}}">Tạo thẻ</a>
                            <a class="btn btn-success" href="javascript:void(0)" data-url="{{route('reader.history',$reader->id)}}" data-modal="show-modal">Lịch sử mượn trả</a>
                            @if($reader->status === Reader::SS_CIRCULATED)
                            <button class="btn btn-danger" btn-confirm="confirm" data-url="{{route('reader.pause',array($reader->id))}}" data-confirm="Bạn có chắc chắn muốn khóa bạn đọc <strong>{{$reader->full_name}}</strong>">Khóa thẻ</button>
                            @elseif($reader->status == Reader::SS_PAUSED)
                            <button class="btn btn-warning" btn-confirm="confirm" data-url="{{route('reader.unpause',array($reader->id))}}" data-confirm="Bạn có chắc chắn muốn mở khóa cho bạn đọc {{$reader->full_name}}">Mở khóa thẻ</button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
