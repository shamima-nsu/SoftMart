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
                                 
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/inbox" style="text-decoration: none;" class="active"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;&nbsp;Inbox&nbsp;&nbsp;({{$inbox_num}})</a></label><hr>
                              
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
                        <div>
                            <?php

                                if($msg->sender==$user->id)
                                {
                                    $rec= $msg->receiver;
                                }
                                else
                                {
                                    $rec= $msg->sender;
                                }

                                ?>
                            <form action="<?php echo Request::root();?>/create_message" method="post" id="form1">
                                <div class="input-group">
                                    <input type="hidden" name="receiver" value="{{$rec}}">
                                    <input type="textarea" class="form-control" name="content">
                                    <span class="input-group-btn">
                                        <input class="btn btn-info" type="submit" value="Reply!">
                                    </span>
                                </div>
                            </form>
                            <br><br>

                            <ul class="list-unstyled" style="width: 100%;">


                                
                                @foreach($messages as $m)
                                    @if(($m->receiver== $msg->receiver && $m->sender== $msg->sender) || ($m->receiver== $msg->sender && $m->sender== $msg->receiver))
                                        <li>

                                            @foreach($users as $us)
                                                @if($m->sender== $us->id)
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
                                                    <h5><a href="<?php echo Request::root();?>/user_profile/{{$us->id}}">{{$us->name}}</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<small>{{$m->created_at->diffForHumans()}}</small></h5>
                                                @endif
                                            @endforeach
                                           <b>{{$m->content}}</b>
                                            <br><hr><br>

                                        </li>
                                    @endif
                                @endforeach   


                            </ul>

                            <!--{!!Form::open(array('method'=>'POST', 'url'=>'create_message'))!!}-->

                            
                                


                                <!--<input type="hidden" name="receiver" value="{{$rec}}"> 

                                {!!Form::textarea('content', null, ['class'=>'form-control', 'size' => '30x5', 'placeholder'=>'Type your reply here...'])!!}<br>
                                
                                <div style="text-align: center;">
                                    {!!Form::submit('Send', ['class'=>'btn btn-success btn-sm'])!!}
                                    <a href="<?php echo Request::root();?>/view_messages/{{$user->id}}" class="btn btn-sm btn-default">Cancel</a>
                                </div>


                            {!!Form::close()!!}-->

                            

                        </div>
                    </div>
                </div>

            </section>

           

            <br><br>

            
    </div>

</div>

</div>

<script>

   
   
      $("#form1").validate({
        rules: {
          content: 
                {
                    required: true
                }
               
        },
        messages:
        {
            content: 
            {
                required: "Message field can't be empty"
                
            }
        }
      });
    

</script>

@include('footer')

@stop