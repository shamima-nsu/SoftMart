@extends('app')
@section('content1')
@include('admin_layout')

<?php 
use App\User_role;
use App\Company_detail;
?>



<div id="page-wrapper">
    <div class="row">
        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-10">
                <div class="panel-body">
                    <?php
                        $roles= User_role::All();
                        $com= Company_detail::All();
                    ?>

                    <ul class="nav nav-tabs" id="myTab">

                      <?php
                        $active_role= User_role::where('id', 1)->first();
                      ?>

                        <li class="active" id="tabs_admin"><a href="#{{$active_role->role}}" data-toggle="tab"><b>{{$active_role->role}}</b></a></li>
                      
                        @foreach($roles as $r)
                            @if($r->id!=1)
                                <li id="tabs_admin"><a href="#{{$r->role}}" data-toggle="tab"><b>{{$r->role}}</b></a></li>
                            @endif
                        @endforeach

                    </ul>
                    <br><br><br>

                    <div id='content' class="tab-content">
      
                        <div class="tab-pane fade in active" id="{{$active_role->role}}">
                            <!--<h3 style="font-family: cursive; color: maroon;"><b>{{$active_role->role}}s</b></h3><hr>-->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr style="background-color:aliceblue; font-size: 13px;">
                                                        <th width="25%">Name</th>
                                                        <th width="25%">Email</th>
                                                        <th width="25%">Company Name</th>
                                                        <th width="25%">Company Website</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    
                                                    @foreach($users as $u)
                                                        <tr class="odd gradeX" style="font-size: 12px;">
                                                            @if(($u->userRoleId==$active_role->id) && $u->approved==1)
                                                                <td>{{$u->name}}</td>
                                                                <td>{{$u->email}}</td>
                                                                
                                                                @if($u->companyId==0)
                                                                    <td>N/A</td>
                                                                    <td>N/A</td>
                                                                @else
                                                                    @foreach($com as $c)
                                                                        @if($c->id==$u->companyId)
                                                                            <td>{{$c->name}}</td>
                                                                            <td><a href="{{$c->websiteUrl}}">{{$c->websiteUrl}}</a></td>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                        
                                                </tbody>

                                            </table>
                                            <br><br>
                                        </div>
                        </div>

                        @foreach($roles as $r)
                             @if($r->id!=1)
                                <div class="tab-pane fade" id="{{$r->role}}">
                                    <!--<h3 style="font-family: cursive; color: maroon;"><b>{{$r->role}}s</b></h3><hr>-->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr style="background-color:aliceblue; font-size: 12px;">
                                                        <th width="25%">Name</th>
                                                        <th width="25%">Email</th>
                                                        <th width="25%">Company Name</th>
                                                        <th width="25%">Company Website</th>
                                                   
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    
                                                    @foreach($users as $u)
                                                        <tr class="odd gradeX" style="font-size: 12px;">
                                                            @if(($u->userRoleId==$r->id) && $u->approved==1)
                                                                <td>{{$u->name}}</td>
                                                                <td>{{$u->email}}</td>
                                                                
                                                                @if($u->companyId==0)
                                                                    <td>N/A</td>
                                                                    <td>N/A</td>
                                                                @else
                                                                    @foreach($com as $c)
                                                                        @if($c->id==$u->companyId)
                                                                            <td>{{$c->name}}</td>
                                                                            <td><a href="{{$c->websiteUrl}}">{{$c->websiteUrl}}</a></td>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                        
                                                </tbody>

                                            </table>
                                            <br><br>
                                        </div>
                                
                                    </div>
                                @endif
                            @endforeach
      
                        </div>    
                </div>
            </div>

        </div>

    </div>

@stop
