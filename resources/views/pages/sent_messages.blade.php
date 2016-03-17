@extends('app')
@section('content1')

<?php

use App\Pic;

?>

@include('nav')



<div class="container m-xs-top">
    <div class="row">
        <div class="col-sm-9">
            <br>
            <h2 class="m-xs-top m-md-bottom"></h2>
                <p class="m-md-bottom">
                     
                    
                </p>
        </div><br>
    
    <br>

</div>

    
    <div class="row m-xs-top">
        <div class="col-md-3">
            <form>
                <div class="search-form-filters">
                    <div>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/create_message" style="text-decoration: none;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;&nbsp;Create new</a></label><hr>
                                <ul id="category" class="list-unstyled">

                                   
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/inbox" style="text-decoration: none;"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;&nbsp;Inbox&nbsp;&nbsp;({{$inbox_num}})</a></label><hr>
                                <ul id="category" class="list-unstyled">

                                   
                        </section>



                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/sent_messages" style="text-decoration: none; color: navy;"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sent items&nbsp;&nbsp;({{$sent_num}})</a></label><hr>
                                <ul class="list-unstyled">
                                    

                                </ul>

                        </section>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-8 col-md-offset-1" style="background-color: white; padding: 50px;">

            <section class="js-search-results air-card m-0-top">
                
                <div class="row">
                    <div class="col-sm-12 jobs-list">
                        <div>

                            <ul class="list-unstyled" style="width: 100%;">
                                

                                @if($sent_num==0)
                                    <h4>No messages to view</h4>
                                @else

                                    @foreach($messages as $msg) 
                                        @if($msg->sender== $user->id)
                                            <a href="#" style="background-color: azure;">
                                                <li>
                                                    @foreach($users as $us)
                                                        @if($msg->receiver== $us->id)
                                                            <?php
                                                           
                                                            $count= Pic::where('userId', $us->id)->count();

                                                            if($count==0)
                                                            {
                                                                $com_pic= "images/user.png";
                                                            }
                                                
                                                    
                                                            else
                                                            {
                                                                $p= Pic::where('userId', $us->id)->orderBy('created_at', 'DESC')->first();
                                                    
                                                                $com_pic= "uploads/pro_pics/".$p->name;
                                                            }

                                                            ?>

                                                            <img src="<?php echo Request::root();?>/public/{{$com_pic}}" style="height: 50px; width: 50px; border-radius: 50%;">
                                                            <h5><a href="<?php echo Request::root();?>/user_profile/{{$us->id}}">{{$us->name}}</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<small>{{$msg->created_at->diffForHumans()}}</small></h5>
                                                        @endif
                                                    @endforeach
                                                    <b>{{$msg->content}}</b>
                                                    <br><br>
                                                    <a style="float: right;" href="<?php echo Request::root();?>/message_history/{{$msg->id}}"><small><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;<i>Show history</i></small></a>
                                                </li>
                                            </a>
                                            <br><hr><br>
                                       
                                        @endif
                                        
                                    @endforeach
                                @endif

                            </ul>

                        </div>
                    </div>
                </div>

            </section>

           

            <br><br>

    </div>

</div>

</div>

@include('footer')

@stop