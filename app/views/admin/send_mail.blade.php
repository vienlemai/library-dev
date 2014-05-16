@extends('layouts.admin')
@section('currentMenu','create_reader')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Gửi mail thu hồi tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Nhập nội dung email</h2>
                </div>
                <div class='content'>
                    <?php if ($readers->isEmpty()): ?>
                        <div class="alert label-warning">
                            Hiện tại không có bạn đọc nào đang mượn tài liệu, không cần phải gửi mail thu hồi
                        </div>
                    <?php else: ?>
                        <div class="span8">
                            @include('partials.flash')
                            {{ Former::horizontal_open(route('send.mail'))->method('POST') }}
                            {{Former::xxlarge_text('title')
                                                    ->label('tiêu đề email (*)')
                            }}
                            {{Former::textarea('content')
                                        ->id('email-content')
                                        ->class('input-xlarge editor')
                                        ->label('Nội dung email (*)')
                                        ->rows(10)
                            }}
                            {{Former::actions()
                                        ->primary_submit('Gửi mail')
                                        ->inverse_reset('Nhập lại')
                            }}

                            {{Former::token()}}
                            {{Former::close()}}
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="block">
                <div class="head">
                    <h2>Danh sách bạn đọc đang mượn tài liệu</h2>
                </div>
                <div class="content">

                    <table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
                        <thead>
                            <tr>
                                <th style='width:10%'>Mã thẻ</th>
                                <th style='width:20%'>Họ tên</th>
                                <th style='width:10%'>Loại bạn đọc</th>
                                <th style='width:15%'>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($readers as $reader): ?>
                                <tr>
                                    <td>{{$reader->barcode}}</td>
                                    <td>{{$reader->full_name}}</td>
                                    <td>{{Reader::$TYPE_LABELS[$reader->reader_type]}}</td>
                                    <td>{{$reader->email}}</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
