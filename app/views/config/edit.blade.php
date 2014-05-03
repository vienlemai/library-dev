@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Cấu hình hệ thống
        </div>
    </div>
    <div class='content'>
        <div class='space'></div>		
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Chỉnh sửa cấu hình</h2>
                </div>
                <div class='content'>
                    @include('partials.flash')
                    {{ Former::horizontal_open(route('config.update'))->method('POST') }}
                    <?php $count = count($configs) ?>
                    @foreach($configs as $key => $config)
                    <?php if (($key === 0) || ($key === $count / 2)): ?>
                        <?php echo '<div class="span6">' ?>
                    <?php endif; ?>
                    {{Former::small_text($config->key)
                    ->label($config->name)
                    ->value($config->value)
                    ->help($config->unit)
                    }}
                    <?php if ((($key + 1) === $count / 2) || (($key + 1) === $count)): ?>
                        <?php echo '</div>' ?>
                    <?php endif; ?>

                    @endforeach
                    <div class="clearfix"></div>
                    {{Former::actions()
                    ->primary_submit('Lưu cấu hình')
                    }}
                    {{Former::close()}}							


                </div>
            </div>
        </div>
    </div>

</div>
@stop