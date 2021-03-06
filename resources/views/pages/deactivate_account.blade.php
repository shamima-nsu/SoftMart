@extends('app')
@section('content1')



@include('nav')



<div class="container m-xs-top" style="height: 100%;">
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
                            <label class="control-label"><a style="text-decoration: none;" href="<?php echo Request::root();?>/change_role/{{$user->id}}" style="text-decoration: none;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;&nbsp;Change user role</a></label><hr>
                               
                        </section>



                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a style="text-decoration: none; color: navy;" href="<?php echo Request::root();?>/deactivate_account" style="text-decoration: none;"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;&nbsp;&nbsp;Deactivate account</a></label><hr>
                            
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
                                
                                <h3>Deactivate your Account</h3>
                                <hr>
                                    Dear {{$user->name}}, <br>

                                    <br>
                                    Are you sure you want to erase your account permanently?

                                    <br><br>

                                    {!!Form::open(array('method'=>'post', 'url'=>'deactivate_action'))!!}
                                    {!!Form::submit('Deactivate', array('class'=>'btn btn-sm btn-danger'))!!}
                                    <a href="<?php echo Request::root();?>/account_settings/{{$user->id}}" class="btn btn-sm btn-default">Cancel</a>
                                    {!!Form::close()!!}
                                
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