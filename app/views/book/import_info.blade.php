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
            <div class="alert alert-success">
                File hợp lệ, nhấn "Lưu" để lưu tài liệu vào cơ sở dữ liệu, hoặc nhấn "Hủy bỏ"
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <h5 class="text-success">Thông tin file</h5>
            <ul>
                <li>Tên file: {{$fileName}}</li>
                <li>Kiểu tài liệu : <?php echo $type == Book::TYPE_BOOK ? 'Sách' : 'Tạp chí/biểu mẫu' ?></li>
                <li>Số lượng tài liệu: {{$numberOfBooks}}</li>
            </ul>
            <div class="text-left">
                {{ Former::horizontal_open_for_files(route('book.import',$type))->method('POST') }}
                {{Former::hidden('file_path')
                    ->value($filePath)
                }}
                <div class="form-actions">
                    <button class="btn-primary btn" type="submit" value="Lưu">Lưu</button>
                    <a href="{{route('book.import',$type)}}" class="btn-inverse btn">Hủy</a>
                </div>
                {{Former::close();
                }}
            </div>
        </div>
    </div>
</div>
@stop
