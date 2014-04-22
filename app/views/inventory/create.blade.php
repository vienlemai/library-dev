@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Kiểm kê tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
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
            </div>
        </div>
    </div>
</div>
@stop