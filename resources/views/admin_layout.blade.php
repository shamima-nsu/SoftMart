<?php

use App\Pending_request;

?>

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h4 class="navbar-brand" style="margin: 0 auto;">Software Market Place System</h4>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i>  <span class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="glyphicon glyphicon-user"></i> User Profile</a>
                        </li>-->
                        <li><a href="reset_password"><i class="glyphicon glyphicon-cog"></i> Reset Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            
                                    {!! Form::open(array('method' => 'post','url' => 'user/logout', 'style'=>'float:right')) !!}
                                    {!! Form::submit('Sign out', ['class'=>'btn btn-sm btn-primary']) !!}
                                    {!! Form::close() !!}
                           
    
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <br><br><br><br><br><a href="profile"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="create_account"><i class="glyphicon glyphicon-pencil"></i> Register Users</a>
                        </li>
                        
                        <li>
                            <a href="userAll"><i class="glyphicon glyphicon-user"></i>  View All Users</a>
                        </li>
                       
                        <?php 

                        $user= Auth::user();
                        $pnum= Pending_request::where('seen', 0)->count();
                        
                        

                        if($user->userRoleId==1){?>
                        <li>
                            <a href="editUsers"><i class="glyphicon glyphicon-edit"></i> Edit Users</a>
                        </li>
                        <li>
                            <a href="showRequests"><i class="glyphicon glyphicon-question-sign"></i>&nbsp;Pending Requests<?php if($pnum>0){?>&nbsp;&nbsp;<span class="badge" style="background-color:#CC5252;"><?php echo $pnum; ?><span><?php }?></a>
                        </li>

                       <?php }?>
                        

                        <li>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" style="text-decoration: none;">
                                <i class="glyphicon glyphicon-plus"></i>&nbsp;Add new&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                            </a>
                        </li>
                        
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body" style="margin-left: 0px;">
                               <ul>
                                    <li style="list-style-type: none;"><a href="addNewCat" style="text-decoration: none;">Category</a></li>
                                    <li style="list-style-type: none;"><a href="add_new_skill" style="text-decoration: none;">Skill</a></li>
                               </ul> 
                            </div>

                        </div>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <script type="text/javascript">
           $('#collapseFour').collapse({
              toggle: false
           });
       
           
        </script>

        <script>
          $('.dropdown-toggle').dropdown();
       </script>

       


