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
					@foreach($configs as $config)
					{{Former::small_text($config->key)
								->label($config->name)
								->value($config->value)
								->help($config->unit)
					}}
					@endforeach
					{{Former::actions()
							->large_primary_submit('Lưu')
					}}
					{{Former::close()}}							


				</div>
			</div>
		</div>
	</div>

</div>
@stop