@extends('layout')

@section('content')
<div class="container content">
	
		<article class="article">
			 <header>
		    <h1>{!! $post->title !!}</h1>
		  </header>
		  <figure class="text-center"><img src="{!! $post->thumbnail !!}" style="width:400px; height:auto; padding:2%;"/></figure>
		  <p>{!! $post->body !!}</p>;
		</article>
		<div class="comments">
		<h3 class="text-center">Rašyti komentarą</h3>
			{!! Form::open (['route'=>'comments.store','files'=>true]) !!}

			   {!! Form::hidden('post_id', $post->id, array('id' => 'post_id')) !!}
		

                <div class="form-group">
                    {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Jūsų pranešimas']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Komentuoti',['class'=>'btn btn-primary form-control create-button']) !!}
                </div>

                @if (count($errors)>0)
                <div class="alert alert-danger">
                	<ul>
                		@foreach($errors->all() as $error)
                		<li>{!! $error !!}</li>
                		@endforeach
                	</ul>
                </div>
                @endif

			{!! Form::close() !!}
		</div>


		<h3 class="text-center">Komentarai</h3>
		<div class="comments-wrap">
			

		</div>
		
	</div>

@endsection