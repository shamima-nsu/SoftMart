
<?php

use App\Notification;
use App\Message;

?>

   <nav class="navbar navbar-new" role="navigation">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" 
               data-target="#example-navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
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


