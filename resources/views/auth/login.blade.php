@extends('layout')

@section('content')

<div class="content container">
<h1 class="text-center">Login form</h1>

<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
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

