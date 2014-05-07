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
                    <div class="span4">
                        <form action="{{route('upload.image')}}" upload-type="readers" class="form-horizontal form-upload-image" method="POST">
                            <!--							<div class="control-group">
                                                            <label class="control-label" for="avatar">Ảnh đại diện (*)</label>
                                                            <div class="controls">
                                                                <input type="file" class="input-choose-image" name="image"/>
                                                            </div>
                                                        </div>-->
                            <div class="control-group">
                                <div class="controls">
                                    <img class="image-preview reader-avatar" src="{{$reader->avatar}}" width="100" height="100"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <h4>Thông tin kiểm soát</h4>
                                    <ul>
                                        <li>Loại bạn đọc: {{Reader::$TYPE_LABELS[$reader->reader_type]}}</li>
                                        <li>Ngày tạo: {{$reader->created_at->format('d/m/Y')}}</li>
                                        <li>Ngày hết hạn: {{$reader->expired_at->format('d/m/Y')}}</li>
                                        <li>Người tạo: {{$reader->creator->full_name }}</li>
                                        <?php if ($reader->expired): ?>
                                            <li style="color: red">Trạng thái: Hết hạn ({{$reader->status->expired_at->diffForHumans()}})</li>
                                        <?php else : ?>
                                            <li>Trạng thái: {{Reader::$SS_LABELS[$reader->status]}}</li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" class="crsf-token" name="token" value="{{Session::token()}}"/>	
                            <input type="hidden" class="old-file" value=""/>
                        </form>
                        <div class="alert alert-error upload-error" style="display: none">           
                            <span></span>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>
                        <div class="progress progress-info progress-small upload-progress" style="display: none">
                            <div class="bar tip" title="" style="width: 0%"></div>
                        </div>


                    </div>
                    <div class="span8">
                        @include('partials.flash')
                        <?php if ($errors->has('avatar')): ?>
                            <div class="alert alert-error upload-error">           
                                {{$errors->first('avatar')}}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        <?php endif; ?>
                        <?php if($reader->isStudent()){
                            echo View::make('reader.partials.view_student',array('reader'=>$reader));
                        }else{
                            echo View::make('reader.partials.view_teacher',array('reader'=>$reader));
                        } ?>
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
