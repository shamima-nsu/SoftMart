@extends('app')
@section('content1')






<?php
    use App\Post;
    use App\SkillsAndPost;
?>

@include('nav')



<div class="container m-xs-top">
    <div class="row">
        <div class="col-sm-9">
            <br>
            
        </div><br>
    
    <br>

</div>

    
    <div class="row m-xs-top">
        <div class="col-md-3">
            <form>
                <div class="search-form-filters">
                    <div>
                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label">Categories</label><hr>
                                <ul id="category" class="list-unstyled">

                                    <?php
                                        $post_num= Post::count();
                                    ?>

                                        <li><a href="<?php echo Request::root();?>/display">All&nbsp;({{$post_num}})</a></li><br>

                                        @foreach($cats as $c)
                                         <?php 
                                             $cat_num= Post::where('categoryId', $c->id)->count();
                                         ?>
                                        
                                            @if($cat_num==0)
                                                <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_category/<?php echo $c->id;?>">{{$c->category}}</a></li><br>    
                                            @else
                                                <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_category/<?php echo $c->id;?>">{{$c->category}}&nbsp; ({{$cat_num}})</a></li><br>
                                            @endif
                                        

                                        @endforeach

                                </ul>
                        </section>
                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label">Skills</label><hr>
                                <ul class="list-unstyled">
                                    @foreach($skills as $sk)
                                        <?php
                                            $s_num= SkillsAndPost::where('skillId', $sk->id)->count();
                                        ?>

                                        @if($s_num==0)
                                            <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_skill/<?php echo $sk->id;?>">{{$sk->skill}}</a></li> <br>   
                                        @else
                                            <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_skill/<?php echo $sk->id;?>">{{$sk->skill}}&nbsp; ({{$s_num}})</a></li><br>
                                        @endif
                                        
                                    @endforeach

                                </ul>

                            </section>
                    </div>
                </div>
            </form>

        </div>
    

    <div class="col-md-8 col-md-offset-1">

            <section class="js-search-results air-card m-0-top">
                
                <div class="row">
                    <div class="col-sm-12 jobs-list">
                        <div>

                            <br><br>

                            @if($count==0)
                                <h3>No notifications to show</h3>
                            @else

                                <a style="float: right; text-decoration: none;" href="<?php echo Request::root();?>/delete_notifications"><small><span class="glyphicon glyphicon-remove">&nbsp;</span>Dismiss all</small></a><br><br>

                            	@foreach($notifications as $not)
                            		@if($not->receiverId== $user->id)

                            			<!-- Quotation -->

                            			@if($not->quotationId!=null)
                            				@foreach($quots as $q)
                            					@if($q->id==$not->quotationId)
                            						@foreach($users as $us)
                            							@if($us->id==$not->senderId)
                            								<b>{{$us->name}} has submitted a proposal in response to your <a href="<?php echo Request::root();?>/view_post/{{$q->postId}}">post</a></b><br>
                            								<small>{{$not->created_at->diffForHumans()}}</small><hr>
                            							@endif
                            						@endforeach
                            					@endif
                            				@endforeach

                            				<!-- Comment -->

                            			@elseif($not->commentId!=null)
                            				@foreach($comments as $com)
                            					@if($com->id== $not->commentId)
    	                        					@foreach($users as $us)
                            							@if($us->id==$not->senderId)
                            								<b>{{$us->name}} has commented on your <a href="<?php echo Request::root();?>/view_post/{{$com->postId}}">post</a></b><br>
                            								<small>{{$not->created_at->diffForHumans()}}</small><hr>
                            							@endif
    	                        					@endforeach
    	                        				@endif
    	                        			@endforeach

    	                        			<!-- Review request -->

    	                        		@elseif($not->reviewRequestId!=null)
                            				@foreach($rev_reqs as $req)
                            					@if($req->id== $not->reviewRequestId)
    	                        					@foreach($users as $us)
                            							@if($us->id==$not->senderId)
                            								<b>{{$us->name}} has requested for a review. Click <a href="<?php echo Request::root();?>/show_review_requests/{{$user->id}}">here</a> to respond</b><br>
                            								<small>{{$not->created_at->diffForHumans()}}</small><hr>
                            							@endif
    	                        					@endforeach
    	                        				@endif
    	                        			@endforeach

    	                        			<!-- Review approval -->

    	                        		@elseif($not->ReviewId!=null)
                            				@foreach($revs as $rev)
                            					@if($rev->id== $not->ReviewId)
    	                        					@foreach($users as $us)
                            							@if($us->id==$not->senderId)
                            								<b>{{$us->name}} has submitted a review for you. Visit <a href="<?php echo Request::root();?>/user_profile/{{$user->id}}">your profile</a> to view</b><br>
                            								<small>{{$not->created_at->diffForHumans()}}</small><hr>
                            							@endif
    	                        					@endforeach
    	                        				@endif
    	                        			@endforeach


                                        @else
                                            
                                            <b>Your request has been approved by admin panel</b><br>
                                            <small>{{$not->created_at->diffForHumans()}}</small><hr>
                                                       

    	                        		@endif

    	                        	<?php

    	                        		if($not->seen==0)
    	                        		{
    	                        			$not->seen= 1;
    	                        			$not->save();
    	                        		}

    	                        	?>

                            		@endif
                            	@endforeach
                            @endif

                        </div>
                    </div>
                </div>

            </section>

    </div>

</div>

<br><br>
        
           

@include('footer')



@stop