@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Quản lý nhân viên
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('users')}}'>
                        <i class='i-reply'></i>
                        Quay lại danh sách
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='space'></div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thôn tin nhân viên</h2>
                </div>
                <div class='content'>
                    @include('partials.flash')
                    {{ Former::horizontal_open(route('user.update',$user->id))->method('POST') }}
                    {{Former::xlarge_text('full_name')
								->label('Họ tên (*)')
                                ->value($user->full_name)
                                ->disabled()
                    }}
                    {{Former::xlarge_text('email')
								->label('Địa chỉ email (*)')
								->autocomplete('off')
                                ->value($user->email)
                                ->disabled()
                    }}
                    {{Former::xlarge_text('username')
								->label('Tên đăng nhập (*)')
								->autocomplete('off')
                                ->value($user->username)
                                ->disabled()
                    }}                    
                    {{Former::xlarge_text('group_id')
								->label('Phân quyền (*)')
                                ->value($user->group->name)
                                ->disabled()
                    }}	
                    <?php if (!$user->isAdmin()): ?>
                        <div class="control-group">
                            <label for="permissions" class="control-label">Các quyền khác</label>
                            <div class="controls">
                                <?php foreach ($permissions as $k => $v): ?>
                                    <label  class="checkbox">                                
                                        <input type="checkbox" name="permissions[]" value="<?php echo $k ?>" <?php echo in_array($k, $curentPermissions) ? 'checked' : '' ?> disabled><?php echo $v ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    {{Former::xlarge_text('date_of_birth')
								->label('Ngày sinh')
                                ->value($user->date_of_birth)
                                ->disabled()
                    }}
                    {{Former::xlarge_text('sex')
								->label('Giới tính')
                                ->value($user->getSexName())
                                ->disabled()
                    }}	
                    <div class='content-row'>
                        <a class='btn btn-primary offset2' href="{{route('user.edit',$user->id)}}">Chỉnh sửa</a>
                        <a class='btn btn-success' href="{{route('users')}}">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop