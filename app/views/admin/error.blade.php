@extends('layouts.login')
@section('content')
<div class="wrap">
	<div class='signin_block'>
		<div class='row-fluid'>
			<div class='alert alert-error'>
				{{$message}}
				<button class='close' data-dismiss='alert' type='button'>×</button>
			</div>
		</div>
	</div>

</div>
@stop