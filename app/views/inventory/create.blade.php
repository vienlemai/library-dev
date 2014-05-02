@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Kiểm kê tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small btn-primary' href='{{route('inventory.index')}}'>
                        <i class='i-plus-2'></i>
                        Quay lại danh sách
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <?php if ($doing): ?>
                    <div class="alert alert-error">            
                        Có một kiểm kê chưa hoàn thành, bạn không thể tạo mới
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                <?php else: ?>
                    <div class='head'>
                        <h2>Thông tin kiểm kê</h2>
                    </div>
                    <div class='content'>
                        {{ Former::horizontal_open(route('inventory.save'))->method('POST') }}
                        {{Former::xxlarge_text('title')
            								->label('Tiêu đề(*)')
                        }}
                        {{Former::textarea('reason')
            								->label('Lý do(*)')
                                            ->class('input-xlarge editor')
                        }}
                        {{Former::actions()
            							->primary_submit('Bắt đầu kiểm kê')
            							->inverse_reset('Nhập lại')
                        }}
                        {{Former::close();
                        }}
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
@stop