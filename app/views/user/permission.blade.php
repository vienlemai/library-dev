@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Quản lý nhân viên
        </div>
    </div>
    <div class='content'>
        <div class='space'></div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Phân quyền</h2>
                </div>
                <div class='content'>
                    @include('partials.flash')
                    {{ Former::horizontal_open(route('user.permission',$user->id))->method('POST') }}
                    {{Former::select('group_id')
								->label('Quyền mặc định')
								->options($groups,$user->group_id)	
                    }}
                    <div class="control-group">
                        <label for="permissions" class="control-label">Các quyền khác</label>
                        <div class="controls">
                            <?php foreach ($permissions as $k => $v): ?>
                                <label  class="checkbox">                                
                                    <input type="checkbox" name="permissions[]" value="<?php echo $k ?>"><?php echo $v ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    {{Former::token()
                    }}

                    <div class='content-row'>
                        <button class='btn btn-primary offset3'>Lưu</button>
                        <button class='btn btn-success'>Hủy bỏ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop