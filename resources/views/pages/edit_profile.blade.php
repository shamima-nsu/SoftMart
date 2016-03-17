@extends('app')
@section('content1')

@include('nav')

{!!Form::open(array('method'=>'Post', 'url'=>'edit_profile'))!!}

	<div style="margin: 100px; padding: 100px; font-family: Verdana, Geneva, sans-serif;">
		@if($user->prof_pic==null)
			<img src="../public/images/user.png" style="height: auto; width: 15%; border-radius: 100%;">
		@else
			<img src="../public/images/{{$user->prof_pic}}" style="height: auto; width: 15%; border-radius: 50px;">
		@endif

		


		<!--<div class="btn-group">
			<button type="button" class="btn btn-info btn-xs" onclick="$('#upload_modal').modal({backdrop: 'static'});">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</div>

		@include('pages.upload_modal')-->



		

		<div style="float: right; margin-right: 30px;">
			<h2><input type="text" name="name" style="border: none; overflow: hidden; background-color: #f8f8f8;" value="{{$user->name}}"></h2>
			
			<input type="hidden" name="id" value="{{$user->id}}">
		</div>
		<br><br>

		

		<div>


		<h3>Overview</h3>
		<hr>
		
		<br>
		@if($user->description!=null)
			<div>
				<textarea name="description" style="width: 100%; height: 300px; border: 1px solid lightgray; padding: 50px; background-color: #f8f8f8; line-height: 200%; text-align: justify;">{{$user->description}}</textarea>
			</div>
		@else
			<b>You may add any description :</b><br><br><input type="textarea" style="width: 100%; height: 100px; padding-left: 50px; border: 1px solid whitesmoke; border-radius: 10px;" name="description" placeholder="Write something about you or your company...">
		@endif


		


		

		</div>
		<br><br><br>

		<b style="font-size: 25px;">Company Details</b>
		<hr><br>
		<div style="margin-bottom: 100px;">
			<div style="line-height: 200%;">
				<b>Name : </b>{{$company->name}}<br>
				<b>Email : </b><input type="email" name="cemail" style="border: none; width: 500px; overflow: hidden; background-color: #f8f8f8;" value="{{$company->email}}"><br>
				<b>Website : </b><input type="text" name="cweb" style="border: none; width: 500px; overflow: hidden; background-color: #f8f8f8;" value="{{$company->websiteUrl}}"><br>
				<span class="glyphicon glyphicon-earphone" style="color: #52CC29;"></span> : &nbsp;<input type="text" name="cphone" style="border: none; width: 500px; overflow: hidden; background-color: #f8f8f8;" value="{{$company->contactNo}}"><br>
				<span class="glyphicon glyphicon-map-marker" style="color: #00CC99;"></span> : &nbsp;<input type="text" name="caddress" style="border: none; width: 500px; overflow: hidden; background-color: #f8f8f8;" value="{{$company->address}}"><br>
				<b>Country : </b><input type="text" name="ccountry" style="border: none; width: 500px; overflow: hidden; background-color: #f8f8f8;" value="{{$company->country}}"><br>
				<input type="hidden" name="company_id" value="{{$company->id}}">
			</div>
			
		</div>

		
		

	</div>


	<div style="text-align: center; display: inline-block; margin-left: 35%;">
		<a href="<?php echo Request::root();?>/user_profile/{{$user->id}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back to profile</a>

		<input type="submit" value="Save Changes" class="btn btn-lg btn-success">

	</div>


{!!Form::close()!!}



@include('footer')

@stop