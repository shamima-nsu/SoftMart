@extends('app')
@section('content1')



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
                                
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/inbox" style="text-decoration: none; color: navy;" class="active"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;&nbsp;Inbox&nbsp;&nbsp;({{$inbox_num}})</a></label><hr>
                                
                        </section>



                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/sent_messages" style="text-decoration: none;"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sent items&nbsp;&nbsp;({{$sent_num}})</a></label><hr>
                            
                        </section>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-8 col-md-offset-1" style="background-color: white; padding: 50px;">

            <section class="js-search-results air-card m-0-top">
                
                <div class="row">
                    <div class="col-sm-12 jobs-list">
                        <div class="pull-left text-left content_display">

                            <ul class="list-unstyled" style="width: 100%;">
                                

                                @if($inbox_num==0)
                                    <h4>No messages to view</h4>
                                @else

                                    @foreach($messages as $msg) 
                                        @if($msg->receiver== $user->id)
                                            <a href="#" style="background-color: azure;">
                                                <li>
                                                    @foreach($users as $us)
                                                        @if($msg->sender== $us->id)
                                                            <h4><a href="<?php echo Request::root();?>/user_profile/{{$us->id}}">{{$us->name}}</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<small>{{$msg->created_at->diffForHumans()}}</small></h4>
                                                        @endif
                                                    @endforeach
                                                    {{$msg->content}} 
                                                    <br><br>
                                                    <a style="float: right;" href="<?php echo Request::root();?>/message_history/{{$msg->id}}"><small><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;<i>Show history</i></small></a>
                                                    <?php

                                                        if($msg->seen==0)
                                                        {
                                                            $msg->seen= 1;
                                                            $msg->save();
                                                        }

                                                    ?>
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