@extends('layout')

@section('content')



<div class="content container">
<h1 class="text-center">Sukurti naują įrašą/mato tik adminas</h1>
    {!! Form::open(['route'=>'blog.store','files'=>true]) !!}

    {!! Form::hidden('user_id',Auth::user()->id,['class'=>'form-control']) !!}

    <div class="form-group">
    {!! Form::label('title','Title : ') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('slug','Adresas : ') !!}
    {!! url('/') . '/ ' . Form::text('slug',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
    {!! Form::label('thumbnail','Thumbnail : ') !!}
    <div class="image-block">
    {!! Form::file('thumbnail',null,['class'=>'form-control']) !!}
    </div>
    </div>


    <div class="form-group">
    {!! Form::label('body','Body : ') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('published_at','Published at : ') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Create post',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

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