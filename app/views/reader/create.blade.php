@extends('layouts.admin')
@section('currentMenu','create_reader')
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
                    <h2>Nhập thông tin <?php echo strtolower(Reader::$TYPE_LABELS[$type]) ?></h2>
                </div>
                <div class='content'>                                   
                    <div class="span4">
                        <form action="{{route('upload.image')}}" upload-type="readers" class="form-horizontal form-upload-image" method="POST">
                            <div class="control-group">
                                <label class="control-label" for="avatar">Ảnh đại diện (*)</label>
                                <div class="controls">
                                    <input type="file" class="input-choose-image" name="image"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <img class="image-preview" src="{{asset('img/no_avatar.gif')}}" width="100" height="100"/>
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
                        <?php
                        if ($type == Reader::TYPE_STUDENT) {
                            echo View::make('reader.partials.create_student');
                        } else if ($type == Reader::TYPE_TEACHER) {
                            echo View::make('reader.partials.create_teacher');
                        } else {
                            echo View::make('reader.partials.create_staff');
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
