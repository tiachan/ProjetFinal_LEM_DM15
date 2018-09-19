@extends('layouts.master')

@section('content')
<h1>Contact</h1>
<form action="{{url('/contact')}}". method="POST">
	{{csrf_field() }}

	<div class="form-group">
		<label for="email" class="control-label">Email</label>
		<input type="email" name="email" id="email" class="form-control" required="required" value="{{old('email')}}"> 
		{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group">
		<label for="description" class="control-label">Description</label>
		<textarea type="text" name="description" rows="10" id="description" class="form-control" required="required">{{old('description')}}</textarea> 
		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</form>


@endsection