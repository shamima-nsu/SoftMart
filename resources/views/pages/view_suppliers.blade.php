@extends('app')
@section('content1')


@include('nav')

<div style="background-color: white; padding: 100px;">
	@foreach($users as $u)
		@if($u->userRoleId==4 || $u->useroleId==5)
			<h3><a href="<?php echo Request::root();?>/user_profile/{{$u->id}}">{{$u->name}}</a><br></h3>
		@endif
	@endforeach
</div>

@include('footer')

@stop