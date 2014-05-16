@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Thông tin tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('book.catalog')}}'>
                        <i class='i-reply'></i>
                        Danh sách tài liệu
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        @include('partials.flash')
        <div class='row-fluid'> 
            <h5>Biên mục tài liệu từ file excel</h5>
            {{ Former::horizontal_open_for_files(route('book.excelValidate',$type))->method('POST') }}
            {{Former::file('book')
                        ->label('Chọn file (*)')
            }}
            {{Former::actions()
                        ->primary_submit('Tải lên')
                        ->inverse_reset('Nhập lại')
            }}
            {{Former::close();
            }}
        </div>
        <div class="row-fluid">
            <?php $messages = $errors->all(); ?>
            <?php if (!empty($messages)) : ?>
                <div class="well">
                    <h5>File đã có lỗi ở tài liệu thứ {{Session::get('index')}} </h5>
                    <ul>
                        <?php foreach ($errors->all() as $k => $v): ?>
                            <li>{{$v}}</li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
@stop
