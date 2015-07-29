@extends('layout')


@section('content')
	<div class="content">
		<ul>
		@foreach($posts as $post)
		
		<li>
		<article class="article">
			 <header>
		    <h5><a href="blog/{!! $post->slug !!}/{!! $post->id !!}">{!! $post->title !!}</a></h5>
		  </header>
		  <figure class="article-img"><img src="{!!$post->thumbnail!!}" style="width:250px;max-width:100%; height:auto;" /></figure>
		</article>
		</li>
		
		@endforeach
		</ul>
		{!! $posts->render() !!}
	</div>

@endsection