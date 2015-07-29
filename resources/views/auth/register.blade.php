@extends('layout')


@section('content')

<div class="content container">
	<h3 class="text-center">Registracija</h3>
	<!-- resources/views/auth/register.blade.php -->
	
	<form method="POST" action="/auth/register">
	    {!! csrf_field() !!}
	
	    <div class="form-group">
	        Name
	        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
	    </div>
	
	    <div class="form-group">
	        Email
	        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
	    </div>
	
	    <div class="form-group">
	        Password
	        <input type="password" class="form-control" name="password">
	    </div>
	
	    <div class="form-group">
	        Confirm Password
	        <input type="password" class="form-control" name="password_confirmation">
	    </div>
	
	    <div class="form-group">
	        <button type="submit" class="btn btn-primary">Register</button>
	    </div>
	</form>
	@if (count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>

@endsection