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
            <h2 class="m-xs-top m-md-bottom"></h2>
                <p class="m-md-bottom">
                     
                    <h4>
                        @if($num==null)
                        <strong>Viewing all results</strong>
                        @elseif($num==1)
                            <strong>Viewing {{$num}} result</strong>
                        @else
                            <strong>Viewing {{$num}} results</strong>
                        @endif
                    </h4>
                </p>
        </div><br>
    <div class="col-sm-3">
        <a href="<?php echo Request::root()?>/new_post" class="btn-newType pull-right m-xs-top">
            Post a job. It’s free!
        </a>
    </div>
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

                                        <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/display">All&nbsp;({{$post_num}})</a></li><br>

                                        @foreach($cats as $c)
                                         <?php 
                                             $cat_num= Post::where('categoryId', $c->id)->count();
                                         ?>
                                        
                                            @if($cat_num==0)
                                                <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_category/<?php echo $c->id;?>">{{$c->category}}</a></li><br>    
                                            @else

                                                @if($cat_id!=$c->id)
                                                    <li><a style="text-decoration: none;" href="<?php echo Request::root();?>/pages/display_on_category/<?php echo $c->id;?>">{{$c->category}}&nbsp; ({{$cat_num}})</a></li><br>
                                                @else
                                                    <li><a style="text-decoration: none; color: navy; font-weight: 600;" href="<?php echo Request::root();?>/pages/display_on_category/<?php echo $c->id;?>">{{$c->category}}&nbsp; ({{$cat_num}})</a></li><br>
                                                @endif

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
                        <div class="pull-left text-left content_display">

                           

                            @foreach($posts as $post)
                            
                                <ul style="list-style-type: none;">
                                   
                                        
                                            
                                    @if($cat_id!=null)
                                        @if($post->categoryId== $cat_id)

                                            <li>
                                                
                                                <br>
                                                <header>
                                                    <h4 class="m-sm-bottom" >
                                                        <a itemprop="url" href="<?php echo Request::root();?>/view_post/<?php echo $post->id; ?>" class="post_title_styling">
                                                            {{$post->title}}
                                                        </a>
                                                        @if($post->status==0)
                                                            <i style="color: gray;font-size: 13px;">&nbsp;&nbsp;Closed</i>
                                                        @endif
                                
                                                    </h4>
                        
                                                </header>

                        

                                                <small>Posted &nbsp;{{$post->created_at->diffForHumans()}}</small>
                            
                                                <br><br>

                        

                        
                                                <div class="o-support-info m-sm-bottom m-sm-top">
                                                    
                                                    
                                                        
                                                    <span class="js-posted">
                                                        <small><b>Deadline:</b> &nbsp;
                                                            <?php

                                                                $deadline= $post->deadline;
                                                                $newDate= date("d-m-Y", strtotime($deadline));

                                                            ?>

                                                            {{$newDate}}

                                                        </small>
                                                    </span>
                                    
                                                </div>
                        
                        
                                
                                                <div class="o-support-info">
                                                    <span class="js-skills skills">
                                                        <span class="display-inline-block m-xs-right"><b>Skills required:</b></span>
                                                        @foreach($skillsToPost as $sp)
                                                            @if($sp->postId== $post->id)

                                                                @foreach($skills as $s)

                                                                    @if($sp->skillId== $s->id)
                                                                        <a data-skill="microsoft-visual-basic" class="o-tag-skill" href="<?php echo Request::root();?>/pages/display_on_skill/<?php echo $s->id; ?>" target="_self">
                                                                            {{$s->skill}}
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                            
                                                    </span>
                                                </div>

                        
                                                <div class="duration">
                                                    @if($post->duration!=null)
                                                        <b>Duration : </b>&nbsp;<i>{{$post->duration}}</i>
                                                    @else
                                                        <b>Duration : </b>&nbsp;<i>not mentioned</i> 
                                                    @endif

                                                    <br>

                                                    <!--<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>-->

                                                </div>
                        

                                                
                                                <hr>


                                            </li>
                                            
                                            
                                            
                                        @endif

                                    @endif

                                   

                                </ul>
                
                            @endforeach
   
                        </div>
                    </div>
                </div>

            </section>

            <script>

                $(window).on('hashchange',function(){
                    page = window.location.hash.replace('#','');
                    getPosts(page);
                });

                $(document).on('click','.pagination a', function(e){
                    e.preventDefault();
                    var page = $(this).attr('href').split('page='+$(this).val());
                    location.hash = page;

                });

                function getPosts(page){

                    $.ajax({
                        url: '/ajax/posts?page=' + page
                    }).done(function(data){
                        $('.content_display').html(data);
                    });
                }


            </script>

            <br><br>

            <!--<ul class="pagination">
              <li><a href="">«</a></li>
              <li class="active"><a href="" value="1">1</a></li>
              <li><a href="" value="2">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href="">5</a></li>
              <li><a href="">»</a></li>
            </ul>-->

    </div>

</div>

</div>

@include('footer')

@stop