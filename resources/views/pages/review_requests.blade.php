@extends('app')
@section('content1')

@include('nav')


@foreach($rev as $r)
	<form method="post" action="<?php echo Request::root();?>/review_action/{{$r->id}}" style="text-align: center;">
	@foreach($users as $us)
		@if($r->senderId==$us->id && $r->receiverId==$user->id)
		
		    <div class="panel panel-info" style="width: 50%; margin: 0 auto; margin-top: 50px;">
			   <div class="panel-heading">
				    <h3 class="panel-title">
				    	<a href="user_profile/{{$us->id}}">{{$us->name}}</a>
                    	&nbsp; &nbsp; &bull; &nbsp; &nbsp;
		                    @foreach($company as $com)
								@if($us->companyId==$com->id)
									{{$com->name}}
								@endif
							@endforeach
	                	</a>
	                	&nbsp; &nbsp; &bull; &nbsp; &nbsp;
	                	<small>Requested {{$r->created_at->diffForHumans()}}</small>
				    </h3>
			    </div>

			    <div class="panel-body">
			        
		        	<input type="textarea" name="content" placeholder="Review please.." style="width: 80%; height: 70px; padding: 10px; border: lightgray dotted 1px; border-radius: 5px; margin-bottom: 10px;">
		        	<br>
		        	
			        
					    <div class="cc-selector" style="text-align: center;">
					        

					        <?php

					        for($i=1; $i<=5; $i++)
					        {?>

					    		<input id="star{{$i}}-{{$r->id}}" type="radio" name="rating_val" value="{{$i}}"/>
					       		<label class="rating star" for="star{{$i}}-{{$r->id}}"></label>

					        <?php }?>
					        
					    </div>
					
			        	
					
					<br>
					<input type="hidden" name="revId" value="{{$r->id}}">
		        	<input type="submit" value="Submit" class="btn btn-sm btn-info">
		        	<a href="<?php echo Request::root(); ?>/reject_review/{{$r->id}}" class="btn btn-sm btn-warning">Reject</a>
			          
			    </div>

			</div>

		@endif
	@endforeach
	</form> 
@endforeach

@include('footer')



@stop