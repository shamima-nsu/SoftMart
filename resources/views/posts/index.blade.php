@extends('app')

@section('content')


	<p>
		<!--$cats= Software_category::all();-->
		{!! link_to_route('posts.create', 'Create Post') !!}
	</p>


	@if($post->count()==0)
		<h5>No posts to view</h5>

	@else
		<h4>Viewing {{ $post->count() }} Posts</h4><br><br>
		<ul>
			@foreach($post as $p)
				<li>

					<a href="{{ route('posts.show', $p->slug) }}">{{ $p->title }}</a>
					
				</li>

			@endforeach
		</ul>
	@endif

	

@stop