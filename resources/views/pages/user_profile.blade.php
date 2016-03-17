@extends('app')
@section('content1')

@include('nav')


<?php

	use App\Pic;

	$count= Pic::where('userId', $u->id)->count();

?>

<div style="margin: 50px; padding: 100px; font-family: Verdana, Geneva, sans-serif;">
	@if($count==0)
		<img src="../public/images/user.png" style="height: auto; width: 15%; border-radius: 100%;">
	@else
		<?php

			$p= Pic::where('userId', $u->id)->orderBy('created_at', 'DESC')->first();
		?>
		<img src="../public/uploads/pro_pics/{{$p->name}}" style="height: auto; width: 15%; border-radius: 100%;">
	@endif

	@if($user!=null)
		@if($user->id==$u->id)
		

			<li class="list-unstyled" onclick="$('#upload_modal').modal({backdrop: 'static'});">
				<a class="btn btn-xs btn-info"><span class="glyphicon glyphicon-plus"></span></a>
			</li>

			@include('pages.upload_modal')

		@endif
	@endif


	<div style="float: right; margin-right: 30px; margin-bottom: 40px;">
		<h2>{{$u->name}}</h2>
		<h4>{{$u->email}}</h4>
		@if($u->phone!=null)
			<h5><span class="glyphicon glyphicon-phone" style="color: limegreen; font-size: 22px;"></span>&nbsp;:&nbsp;&nbsp;{{$u->phone}}</h5>
		@endif
		<h4><a href="{{$company->websiteUrl}}">{{$company->name}}</a></h4>
		<h5>{{$company->country}}</h5>
		<br><br>
		
		
		
		
	</div>

	
	


	<br><br>


	

	<div>

	<?php
		if($u->description!=null) 
		{
	?>
	<h2>Overview</h2>
	<hr>
	
	<br>
	<div style="line-height: 400%; text-align: justify;" >
		{{$u->description}}
	</div>


	<?php } ?>


	

	</div>
	<br><br><br><br>

	<div style=" margin-top: 90px;">
		<b style="font-size: 22px;">Company Details</b>
		@if($user!=null)
			@if($user->id==$u->id)
				<a style="float: right;" href="<?php echo Request::root(); ?>/edit_profile/{{$u->id}}"><span class="glyphicon glyphicon-pencil"></span></a>
			@endif
		@endif

		<hr><br>
		<div style="margin-bottom: 280px;">
			<div style="float: left; line-height: 200%;">
				<b>Name : </b>{{$company->name}}<br>
				<b>Email Address : </b>{{$company->email}}<br>
				
				<b>Website : </b><a href="{{$company->websiteUrl}}">{{$company->websiteUrl}}</a><br><br>
				<span class="glyphicon glyphicon-earphone" style="color: #52CC29; font-size: 25px;"></span> : &nbsp;{{$company->contactNo}}
				<span class="glyphicon glyphicon-map-marker" style="color: #00CC99; font-size: 25px; margin-left: 80px;"></span> : &nbsp;{{$company->address}}<br><br>
				<b>Country : </b>{{$company->country}}<br>
			</div>

			
		</div>
	</div>

	@if($user!=null)
		@if($user->id!=$u->id)
			@if($user->userRoleId==4 || $user->userRoleId==5)
				@if($u->userRoleId==3 || $u->userRoleId==5)
					<form action="<?php echo Request::root();?>/review" method="get" style="text-align: center;">
						<input type="hidden" name="receiverId" value="{{$u->id}}">
						<input type="submit" class="btn btn-info" value="Request for a review">
					</form>
					<br><br>
				@endif
			@endif
		@endif
	@endif


	<?php
		if($u->userRoleId==4 || $u->userRoleId==5) 
		{
			if($num>0)
			{


	?>

	<div style="background-color: white; border: 1px solid lightgray; font-family: Verdana, Geneva, sans-serif; padding: 100px; margin-top: 70px;">

		<h3>Work experience and feedback</h3>
		<hr><br>
		@foreach($reviews as $rev)
			@if($rev->receiver== $u->id)
				<small>{{$rev->created_at->diffForHumans()}}</small><br><br><br>
				
				<blockquote>
					<span style="color: darkgray; font-size: 14px; font-family: cursive;">"{{$rev->content}}"</span><br>
					<br><i><small>
						@foreach($users as $us)
							@if($rev->giver==$us->id)
								{{$us->name}}
							@endif

						@endforeach
					</small></i>
				</blockquote>

				<br><br>
				<b>Rating :&nbsp;&nbsp;</b>
				<?php $w_r= 5-$rev->rating;

				for($i=1; $i<=$rev->rating; $i++)
				{
					echo "<b><span class=\"glyphicon glyphicon-star\" style=\"color: #5CE65C; font-size: 25px;\"></span></b>";
				}

				

				for($i=1; $i<=$w_r; $i++)
				{
					echo "<b><span class=\"glyphicon glyphicon-star\" style=\"color: gray; font-size: 25px;\"></span></b>";
				}

				?>

				<br><br><hr><br>


			@endif
		@endforeach
	</div>

	<?php }
}

if($u->userRoleId==3 || $u->userRoleId==5)
{?>
	
	<div style="text-align: center; font-family: Verdana, Geneva, sans-serif; background-color: white; padding: 50px;">

		<h4><b>Projects offered by this client :<b></h4><br>

		@if($post_num>0)
			@foreach($posts as $p)
				@if($p->userId==$u->id)
					<h5><a href="{{url('view_post/'.$p->id)}}">{{$p->title}}</a></h5>
				@endif
			@endforeach
		@else
			<h6 style="color: gray;">No project yet</h6>
		@endif
	</div>

	<?php

}?>


</div>


	@include('footer')

@stop