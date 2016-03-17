@extends('app')
@section('content1')
<?php

use App\Notification;
use App\Message;

?>

    <head>
        <title>Software Market Place System</title>
        
        <link href="<?php echo Request::root();?>/public/css/style.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo Request::root();?>/public/css/main.css" rel='stylesheet' type='text/css' />
        
        <script type="text/javascript" src="<?php echo Request::root();?>/public/js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo Request::root();?>/public/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1500);
                });
            });
        </script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
        <!----start-top-nav-script---->
        <script>
           /* $(function() {
                var pull        = $('#pull');
                    menu        = $('nav ul');
                    menuHeight  = menu.height();
                $(pull).on('click', function(e) {
                    e.preventDefault();
                    menu.slideToggle();
                });
                $(window).resize(function(){
                    var w = $(window).width();
                    if(w > 320 && menu.is(':hidden')) {
                        menu.removeAttr('style');
                    }
                });
            });*/
        </script>
        <!----//End-top-nav-script---->

    </head>
    <body>
        <div class="logo">
               <a style="text-decoration: none; margin-left: 5px;" href="<?php echo Request::root();?>/"><span style="color: #8dd5e4; font-size: 36px; font-family: fantasy;">&nbsp;S</span><span style="color: #D74142; font-size: 48px; font-weight: 600;">0</span><span style="color: #8dd5e4; font-size: 36px; font-family: fantasy;">FT</span><span style="font-size: 22px; font-family: cursive; color: #FC645F;">Mart</span></a>
            </div>
         </div>
         <div class="collapse navbar-collapse" id="example-navbar-collapse" >

            @if($user!=null)
               
               <ul class="nav navbar-nav" style="width: 90%; float: right;">
                  <li class="active" id="nav_items"><a href="<?php echo Request::root();?>/" id="nav_links"><span class="glyphicon glyphicon-home"></span><br>Home</a></li>
                  
                  <li id="nav_items">
                     <a href="<?php echo Request::root();?>/display" id="nav_links"><span class="glyphicon glyphicon-search"></span><br>
                        All Posts
                     </a>

                     
                  </li>

                  
                  <!--<li id="nav_items"><a href="#" id="nav_links"><span class="glyphicon glyphicon-map-marker"></span><br>Contact</a></li>-->
                  
                     <?php

                     $n_num= Notification::where('receiverId', $user->id)->where('seen', 0)->count();

                     ?>

                    
                        <li id="nav_items"><a href="<?php echo Request::root();?>/notifications/{{$user->id}}" id="nav_links"><span class="glyphicon glyphicon-question-sign"></span><br>Notifications<?php if($n_num>0){?>&nbsp;&nbsp;<span class="badge" style="background-color:#E81919;"><?php echo $n_num; ?><span><?php }?></a></li>
                    

                    <?php

                     $m_num= Message::where('receiver', $user->id)->where('seen', 0)->count();

                     ?>

                    
                        
                     <li class="dropdown" id="nav_items">
                        <a href="#" class="dropdown-toggle" id="nav_links" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span><br>
                           Messages <?php if($m_num>0){?>&nbsp;&nbsp;<span class="badge" style="background-color: #E81919;"><?php echo $m_num; ?></span><?php }?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" id="dropdown_styling">
                           <li><a href="<?php echo Request::root();?>/create_message"><br><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;Create new<br><br></a></li>
                           <li><a href="<?php echo Request::root();?>/inbox"><br><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;Inbox<br><br></a></li>
                           <li><a href="<?php echo Request::root();?>/sent_messages"><br><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;Sent items<br><br></a></li>
                           
                           
                        </ul>
                     </li> 

                     <li class="dropdown" id="nav_items">
                        <a href="#" class="dropdown-toggle" id="nav_links" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><br>
                           {{$user->name}} <b class="caret"></b>
                        </a>


                        <ul class="dropdown-menu" id="dropdown_styling">
                           <li><a href="<?php echo Request::root();?>/user_profile/{{$user->id}}"><br><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;My profile<br><br></a></li>
                           <li><a href="<?php echo Request::root();?>/account_settings/{{$user->id}}"><br><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Account Settings<br><br></a></li>

                           
                           <li><a href="<?php echo Request::root();?>/signout"><br><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;Sign out<br><br></a></li>
                           
                        </ul>
                     </li> 
                    

                  </ul>


               @else

               <ul class="nav navbar-nav" style="width: 80%; float: right;">
                  <li class="active" style="width: 30%;"><a href="<?php echo Request::root();?>/" id="nav_links"><span class="glyphicon glyphicon-home"></span><br>Home</a></li>
                  
                  <li style="width: 30%;">
                     <a href="<?php echo Request::root();?>/display" id="nav_links"><span class="glyphicon glyphicon-search"></span><br>
                        All Posts
                     </a>

                     
                  </li>

                  
                  <!--<li style="width: 20%;"><a href="#" id="nav_links"><span class="glyphicon glyphicon-map-marker"></span><br>Contact</a></li>-->
                  
                 
                  <li class="dropdown" style="width: 30%;">
                        <a href="#" class="dropdown-toggle" id="nav_links" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span><br>
                           Sign in <b class="caret"></b>
                        </a>


                        <ul class="dropdown-menu" id="dropdown_styling" style="width: 100%;">
                           {!! Form::open(array('id'=>'form1', 'url' => 'signin_user', 'method' => 'post', 'name'=>'newForm')) !!}

                          <div class="signin_form_users">
                              <div class= "form-container-signin">
                                  <div class="form-group">
                                      
                                  
                                  {!! Form::email('email', null, array('class'=>'form-control', 'required'=>'required', 'placeholder'=>'Email', 'type'=>'email', 'required'=>'required')) !!}
                                  
                                  </div>

                                  <div class="form-group">
                            
                                  {!!Form::password('password',array('class'=>'form-control', 'required'=>'required', 'placeholder'=>'Password'))!!}
                                 
                                 
                                  </div>
                          </div>
                                 
   
                            <div class="col col1of3">

                                <input name="_token" type="hidden" id="csrf_token" value="{{ csrf_token() }}"/>
                                
                               

                                <input type="submit" name="submit" id="submit" value="Sign in" class="btn btn-success">

                            </div><br>
                            <a style="text-decoration: none;" class="btn btn-info" href="<?php echo Request::root();?>/signup">Create new account</a>
                            <br><br><i><a style="font-size: 12px; text-decoration: none;" href="reset_user_password">Forgot your password??</i></a>
                          <br>
                            

                            {!!Form::close()!!}
  
                        </ul>
                     </li>     
               </ul>


            @endif



         </div>
      </nav>
   <script>
      $('.dropdown-toggle').dropdown();

   </script>

   <script>

    $("#form1").validate({
        rules: {
             
                email: 
                {             
                    required: true,
                    email: true
                },
                password:
                {
                    required: true
                }
                
        },
        messages:
        {
           
            email: 
            {
                email: "Please enter valid email address",
                required: "Email field can't be empty"
            },

            password:
            {
                required: "Password is required"
            }
        }
      });
    </script>




<div id="top" class="bg">

       
        <br><br>


        
            <!--header-info -->
            <div class="header-info text-center">
                <div class="container bg_img">
                    <h1><span> </span><label>Clients</label> in your business<span> </span></h1>
                    <p>Your clients on the internet. Learn how to receive them.</p>
                    <a class="big-btn">I want clients</a>
                    <a class="down-arrow down-arrow-to scroll" href="#about"><span> </span></a>
                    <br><br><label class="mouse-divice"> </label>
                </div>
            </div>
            </div>
            <div class="clearfix"> </div>
            <!-- header-info -->
            <!--- about-us ---->
            <div id="about" class="about">
                <div class="container">
                    <div class="about-head text-center">
                        <h3>What can <span>you receive?</span></h3>
                        <p></p>
                    </div>
                    <!--- about-grids ---->
                    <div class="about-grids">
                        <div class="col-md-3">
                            <div class="about-grid text-center">
                                <span class="about-icon1"> </span>
                                <h3>CLIENTS<br /><label> </label></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="about-grid text-center">
                                <span class="about-icon2"> </span>
                                <h3>branding<br /><label> </label></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="about-grid text-center">
                                <span class="about-icon3"> </span>
                                <h3>marketing<br /><label> </label></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="about-grid text-center">
                                <span class="about-icon4"> </span>
                                <h3>adv.<br /><label> </label></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!--- about-grids ---->
                </div>
                <a class="about-down-icon down-arrow-to scroll" href="#expand"><span> </span></a>
            </div>
            <!--- about-us ---->
            <!--- expand ---->
            <div id="expand" class="expand">
                <div class="container">
                    <div class="expand-info text-center">
                        <h2><span>Expand</span> your business</h2>
                        <a class="expand-btn" href="<?php echo Request::root();?>/signup">Join Us</a>
                    </div>
                    <span class="w-mouse"> </span>
                    <a class="e-down-arrow down-arrow-to scroll" href="#wedo"><span> </span></a>
                </div>
            </div>
            
            <div id="wedo" class="wedo">
                <div class="container">
                    <div class="wedo-head text-center">
                        <h3>The process <span>we follow</span></h3>
                    </div>
                    <!--- wedo-grids ---->
                    <div class="wedo-grids">
                        <div class="col-md-6 wedo-left">
                            <h4><label> </label>Tell us about your desired product</h4><br>
                            <p>If you are in need of any software product, then this is the right place for you.<br>The best IT professionals are here to offer you their best services.<br><br>And of course,<br>you'll have the flexibility to choose the most eligible one among them :)</p>
                            <br><br><a class="wedobtn" href="<?php echo Request::root();?>/display">View sample posts</a>
                        </div>
                        <div class="col-md-6 wedo-right">
                            <img style="float: right; height: 400px; width: 450px; border-radius: 20%;" src="<?php echo Request::root();?>/public/images/it2.jpg" title="demo" />
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!--- wedo-grids ---->
                    <a class="w-down-arrow down-arrow-to scroll" href="#marketing"><span> </span></a>
                </div>
            </div>
            
            <div id="marketing" class="marketing">
                <div class="container">
                    <div class="marketing-grids">

                      <div class="col-md-6 marketing-left">
                            <img style="height: 400px; width: 450px; border-radius: 20%;" src="<?php echo Request::root();?>/public/images/it3.jpg" title="marketing" />
                        </div>
                        <div class="col-md-6 marketing-right">
                            <h4><label> </label>It's coding time !!</h4><br>
                            <p>Search for the project on which you'd enjoy to work<br>Start brainstorming and flourish your business through your latent knowledge and strong dedication.<br><br>Happy Coding :) :)</p>
                            <br><br><a class="wedobtn" href="<?php echo Request::root();?>/display">Search for project</a>
                        </div>
                        
                        <div class="clearfix"> </div>
                    </div>
                    
                </div>
            </div>
            
            
            
            <div id="contact" class="address">
                
                
            </div>
            
            
            <!---- footer ---->
            <link rel="stylesheet" href="<?php echo Request::root();?>/public/css/swipebox.css">
            <script src="<?php echo Request::root();?>/public/js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
                </script>

    



@include('footer')

@stop