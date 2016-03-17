@extends('app')

@section('content')

	<h2>Create Post</h2>

	<?php $cats = DB::table('software_categories')->orderBy('category', 'asc')->lists('category','id');?>
	{!! Form::model(new App\Post, ['route'=> ['posts.store']]) !!}
	@include('posts/partial/new_form', ['submit_text'=>'Create Post', array('cats'=>$cats)])
	{!! Form::close() !!}


@stop