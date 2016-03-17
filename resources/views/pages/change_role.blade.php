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
                            <label class="control-label"><a style="text-decoration: none;" href="<?php echo Request::root();?>/reset_pass" style="text-decoration: none;"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;&nbsp;Reset password</a></label><hr>
                                
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a style="color: navy; text-decoration: none;" href="<?php echo Request::root();?>/change_role/{{$user->id}}" style="text-decoration: none;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;&nbsp;Change user role</a></label><hr>
                               
                        </section>



                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a style="text-decoration: none;" href="<?php echo Request::root();?>/deactivate_account" style="text-decoration: none;"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;&nbsp;&nbsp;Deactivate account</a></label><hr>
                            
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
                                
                                <lead>
                                    Dear <b>{{$user->name}}</b>,<br>
                                    <br>You are currently registered as
                                    @foreach($roles as $r)
                                        @if($user->userRoleId==$r->id)
                                            @if($user->userRoleId==5)
                                                <b>{{$r->role}} client and supplier </b>
                                            @else
                                                <b>{{$r->role}}</b>
                                            @endif
                                        @endif
                                    @endforeach

                                    @if($user->userRoleId==3 || $user->userRoleId==4)
                                        <br>You are allowed to request the admin for the role of both owner and supplier<br><br>
                                        
                                        {!!Form::open(array('method'=>'post', 'url'=>'change_role_request'))!!}
                                        <input type="hidden" name="uid" value="{{$user->id}}">
                                        {!!Form::submit('Request', array('class'=>'btn btn-sm btn-info'))!!}
                                        {!!Form::close()!!}

                                    @elseif($user->userRoleId==1 || $user->userRoleId==2)
                                        <br>You may change your role from admin panel by yourself
                                    @else
                                        <br>You are not allowed to change your role more than once
                                    @endif
                                </lead>

                                
                            </ul>

                        </div>
                    </div>
                </div>

            </section>

           

            <br><br>

            
        </div>

    </div>

</div>


@stop