@extends('app')
@section('content1')


<?php

use App\Pic;

?>


@include('nav')
<div class="all_container">
	<div class="post-container1">

		<h3 class="post_title_styling_view">{{$post->title}}</h3>
		

		@foreach($users as $u)
			@if($u->id == $post->userId)
				<h4><a href="<?php echo Request::root();?>/user_profile/{{$u->id}}">{{$u->name}}</a></h4>
			@endif
		@endforeach

		@if($user!=null)
			@if($user->id== $post->userId || $user->userRoleId==1 || $user->userRoleId==2)
				<div class="actions_post">
					<div class="btn-group">
					   <a class="dropdown-toggle" style="border: none;" data-toggle="dropdown">
					      <span class="glyphicon glyphicon-option-vertical" id="sp"></span>
					   </a>
					   <ul class="dropdown-menu" role="menu">
						    <li>
						      	<!--<form method="post" action="edit_post">
						      		<a id="dd_style" data-toggle="modal" data-target="#confirmEdit" data-title="Edit Post" data-message="Are you sure you want to close this post ?">
								        <span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit
								    </a>
						      	</form>-->

						      	@if($user->id== $post->userId)
							      	
								      	<li>
											<a id="dd_style" href="<?php echo Request::root();?>/edit_post/{{$post->id}}"><span class="glyphicon glyphicon-pencil" id="sp1"></span>&nbsp;Edit</a>
										</li>
									
								@endif
						    </li>
					      

					        <li data-form="#frmDelete-{{$post->id}}" data-title="Confirm your action" data-message="Are you sure you want to delete this post permanently ?" >
					            <a class = "formConfirm" id="dd_style" href=""><span class="glyphicon glyphicon-trash" id="sp1"></span>&nbsp;Delete</a>
					        </li>
					        <li>
						      	
								@if($user->id== $post->userId)
									@if($post->status==1)
										<li onclick="$('#close_modal').modal({backdrop: 'static'});">
											<a id="dd_style" ><span class="glyphicon glyphicon-remove" id="sp1"></span>&nbsp;Close</a>
										</li>
									@else
										<li onclick="$('#open_modal').modal({backdrop: 'static'});">
											<a id="dd_style" ><span class="glyphicon glyphicon-globe" id="sp1"></span>&nbsp;Open</a>
										</li>
									@endif
								@endif

								
					      	</li>

					      	{!!Form::open(array(
					      		'url' => route('delete_post'),
				                'method' => 'post',
				                'style' => 'display:none',
				                'id' => 'frmDelete-' . $post->id))!!}
				            <input type="hidden" value="{{$post->id}}" name="id">
				            
				            {!!Form::close()!!}

					   </ul>
					</div>
				</div>

			
			@include('posts.delete_confirm')
			@include('posts.close_confirm')
			@include('posts.open_confirm')
			


			@endif

		@endif

		<?php
            echo "<small>Posted ".$post->created_at->diffForHumans()."</small>";
        ?>

        <script>
        	$('.dropdown-toggle').dropdown();
        </script>
        <br>

        <em>Application Deadline: &nbsp;{{$post->deadline}}</em><br>
		<h4 class="lead" style="color: #00B85C; font-size: 20px;"><b>Description</b></h4>
		<div class="description_styling">
			{{$post->description}}
		</div><br>
		<b style="color: green;">Duration:&nbsp;&nbsp;</b>
		@if($post->duration==null)
			<i>Not mentioned</i>
		@else
			{{$post->duration}}
		@endif

		<br>

		@if($s_num!=0)
			Skills Required: &nbsp;&nbsp;
			@foreach($sp as $skp)
				@if($skp->postId== $post->id)
					@foreach($skills as $skill)
						@if($skill->id== $skp->skillId)
							<a data-skill="microsoft-visual-basic" class="o-tag-skill" href="{{url('pages/display_on_skill/'.$skill->id)}}" target="_self">
                                {{$skill->skill}}
                            </a>
						@endif
					@endforeach
				@endif
			@endforeach
		@endif

	    
    	@foreach($files as $f)
    		@if($f->postId== $post->id)

    			<br><br><b>For more details: </b>&nbsp;&nbsp;<a style="text-decoration: none;" href="<?php echo Request::root();?>/download_attachment_post/{{$post->id}}"><span class="glyphicon glyphicon-download-alt"></span>&nbsp; &nbsp;{{$f->filename}}</a><br><br>

    		@endif
    	@endforeach
   		

		<hr>

		
		

		@if($quots>0)

			<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-weight: 600; text-decoration: none;">
				<i>Number of Applicants :</i>&nbsp; &nbsp;{{$quots}}
			</a>

			<div id="collapseOne" class="panel-collapse collapse">
		        <div class="panel-body"> 
		            <ul class="list-unstyled">
						@foreach($quotations as $qt)
							
							@if($qt->postId== $post->id)

								<li>
									@foreach($users as $all_users)
										@if($qt->vendorId== $all_users->id)
											<a href="<?php echo Request::root();?>/user_profile/{{$all_users->id}}">{{$all_users->name}}</a>&nbsp; &nbsp; &bull; &nbsp; &nbsp;<small>{{$qt->created_at->diffForHumans()}}</small>
										@endif
									@endforeach
								</li>

							@endif

						@endforeach
					</ul>
		        </div>

			</div>


		@else
			<i>Number of Applicants:</i>&nbsp; &nbsp;{{$quots}}
		@endif

		<br>
		
		<div>
			@if($user==null || $user->userRoleId==4)
				@if($post->status==1)
					<br>
					<!--<a href="display" class="btn btn-md btn-default">Cancel</a>-->
					<div style="text-align: center;">
						<a href="<?php echo Request::root();?>/submit_quotation/{{$post->id}}" class="btn btn-md btn-newType">Apply for this project</a>
					</div>
					<br>

				@endif

			@else
				
				@if($user->id!= $post->userId)
					<br>

				@else
					@if($quots>0)
						{!!Form::open(array('method'=>'GET', 'url'=>'view_quotations', 'style'=>'text-align: center;'))!!}
						<input type="hidden" name="post_id" value="{{$post->id}}">
						{!!Form::submit('View Submissions', ['class'=>'btn btn-md btn-newType'])!!}
						<!--<a href="display" class="btn btn-md btn-default">Cancel</a>-->
					</form>
						

						<br>
					@else
						<br>

					@endif

				@endif

			@endif
				

		</div><br>

		
		<br>

	</div>

	<div class="comment-container">

		<div style="text-align: center;">
			<img src="../public/images/Discussion.png" style="width:90px; height: 70px;"><br>
		</div>
	    <h3 style="color: #00B85C; text-align: center; font-family: cursive; margin-bottom: 60px;"><b>DISCUSSION BOARD</b></h3>
		
		<?php

			$all_responses="";

			if($c_num==0)
			{
				$all_responses = "<div id=\"none_yet_div\">No comments yet.</div>";
			}

			else
			{
				foreach($comments as $com)
				{
					
                  


				
					if($com->postId==$post->id)
					{
						$com_content= $com->content;
						$com_time= $com->created_at->diffForHumans();
	                   

						foreach($users as $u)
						{
							if($com->userId==$u->id)
							{
								$com_user= $u->name;
								$com_id= $u->id;
								
								$count= Pic::where('userId', $u->id)->count();

								if($count==0)
								{
									$com_pic= null;
								}
					
						
								else
								{
									$p= Pic::where('userId', $u->id)->orderBy('created_at', 'DESC')->first();
						
									$com_pic= "uploads/pro_pics/".$p->name;
								}



							}
						}

						$root= Request::root();

						if($com_pic==null)
						{
							$all_responses .= "<div id=\"all_responses\">
												<img class=\"img-thumbnail\"src=\"../public/images/user.png\" style=\"height: auto; width: 10%; border-radius: 100%;\">
												<div class=\"response_top_div\">
													<a href=".$root."/user_profile/".$com_id.">".$com_user."</a>
													&nbsp; &nbsp; &bull; &nbsp; &nbsp;
													<small>" . $com_time . "</small>
												</div>
												<div class=\"response_div\">" . $com_content . "</div>
											</div><br><br>";
						}
						else
						{
							$all_responses .= "<div id=\"all_responses\">
												<img class=\"img-thumbnail\"src=\"../public/".$com_pic."\""."style=\"height: auto; width: 10%; border-radius: 100%;\">
												<div class=\"response_top_div\">
													<a href=".$root."/user_profile/".$com_id.">".$com_user."</a>
													&nbsp; &nbsp; &bull; &nbsp; &nbsp;
													<small>" . $com_time . "</small>
												</div>
												<div class=\"response_div\">" . $com_content . "</div>
											</div><br><br>";
						}

					
					}

					
				}
			}

			echo $all_responses;


		?>
	
	@if($post->status==1)
		<div style=" margin-top: 50px;">
			<div class="panel panel-success">
		        <div class="panel-heading">
		         	<h4 class="panel-title">
		            	<div style="text-align: center;">
		            		@if($user!=null)
			            		<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" style="text-decoration: none;">
			               			<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;Participate in this discussion
			            		</a>
			           		@else
			            		
			               		<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Please Sign in to participate in this discussion
			            		
			            	@endif

		              	</div>
		        	</h4>
		      	</div>

		      	@if($user!=null)
				    <div id="collapseFour" class="panel-collapse collapse">
				        <div class="panel-body"> 
				            <form id="comment_form" action="<?php echo Request::root();?>/comment_action" method="post">
				            	<input type="textarea" class="form-control_comment" id="comment" name="content" placeholder="Type your comment here...">
					            <input type="hidden" name="uid" id="uid" value="{{$user->id}}">
					            <input type="hidden" name="pid" id="pid" value="{{$post->id}}">
					            <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
					            
				        		<!--<button type="button" class="btn btn-sm btn-success" id= "comment_button" style="float: right; margin: 5px;">Submit</button>-->
				        		<input type="submit" class="btn btn-sm btn-success" id= "comment_button" style="float: right; margin: 5px;">
				        	</form>
				        </div>

				    </div>
			    @endif  
		   	</div>
	    </div>
	@endif

  


	<script>

		/*$(document).ready(function(){

			
		});*/
		

	</script>
    
    <script type="text/javascript">
	   $(function () { $('#collapseFour').collapse({
	      toggle: false
	   });

	   $('#collapseOne').collapse({
	      toggle: false
	   });
	});
	</script>

	<script>

	   /*$("#comment_button").click(function(e){
				

				 e.preventDefault();
				 var token = $("#token").val();
				 var a= $("#comment").val();
				 var uid= $("#uid").val();
				 var url = "<?php echo Request::root();?>";

				 //alert(a);


				$.ajax({

					url: url+"post/comment_action",
					type: "POST",
					async: false,
					data: {newComment:a, uid:uid, pid:pid, _token: token},

					success: function (newResult){

						
						if(newResult!="")
						{
							newResult= JSON.parse(newResult);
							$("#all_responses").append(newResult);
						}
						else
						{
							alert("blank");
						}
						
					}
				}).error(function()
				{
					alert("Error");
				});
				
			});*/
	   
	</script>
        
		
	</div>
</div>



	<br>
	<div class="post-container2">
		
		<h4><b>Other open projects by this client:<b></h4><br>

		@foreach($posts as $p)
			@if(($p->userId==$post->userId) && ($p->id!= $post->id) && ($p->status==1))
				<h5><a href="{{url('view_post/'.$p->id)}}">{{$p->title}}</a></h5>
			@endif
				
		@endforeach

		

	</div>

	<script>

    $(document).ready(function() {
      $("#comment_form").validate({
        rules: {
          content: "required"
        },
        messages: {
          content: "Please enter any text"
        }
      });
    });

</script>


@stop