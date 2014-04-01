@if(Session::has('success'))
<div class="alert alert-success">
	{{Session::get('success')}}
	<button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@elseif(Session::has('error'))
<div class="alert alert-error">
	{{Session::get('error')}}
	<button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif