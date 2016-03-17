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
                            <label class="control-label"><a style="color: navy; text-decoration: none;" href="<?php echo Request::root();?>/reset_pass" style="text-decoration: none;"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;&nbsp;Reset password</a></label><hr>
                                
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a style="text-decoration: none;" href="<?php echo Request::root();?>/change_role/{{$user->id}}" style="text-decoration: none;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;&nbsp;Change user role</a></label><hr>
                               
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
                        <div>

                            <ul class="list-unstyled" style="width: 70%;">
                                
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Reset your password</h3>
                                    </div>
                                    <div class="panel-body">
                                        {!! Form::open(array('url' => 'reset_password_user', 'id'=>'form1', 'method' => 'post')) !!}
                                            <fieldset>
                                               
                                                
                                                    {!! Form::label('Password_old', 'Current Password :') !!}
                                                    {!! Form::password('password_old', ['class'=>'form-control']) !!}
                                                    <br>
                                                
                                                    {!! Form::label('Password', 'New Password :') !!}
                                                    {!! Form::password('password', ['id'=>'password', 'class'=>'form-control']) !!}
                                                    <br>
                                                
                                                    {!! Form::label('Password_confirmation', 'Confirm New Password :&nbsp;&nbsp;&nbsp;&nbsp;') !!}
                                                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                                    <br>

                                                
                                                 {!! Form::submit('Save change', array('class' => 'btn btn-md btn-info')) !!}
                                                 <a href="<?php echo Request::root();?>/account_settings/{{$user->id}}" class="btn btn-default">Cancel</a><br>

                                                 {!! Form::close()!!}

                                            
                                                
                                            </fieldset>
                                    </div>
                                
                                </div>

                                
                            </ul>

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
          
                password_old:
                {
                    required: true
                },

                password:
                {
                    required: true,
                    minlength: 5
                },
                password_confirmation: {
                    required: true,
                    equalTo: ("#password"),
                    minlength: 5

                }
                
        },
        messages:
        {
            
            password_old:
            {
                required: "Current password is required"
            },

            password:
            {
                minlength: "Password must contain at least 5 characters",
                required: "Password is required"
            },

            password_confirmation:
            {
                required: "Password confirmation is required",
                minlength: "At least 5 characters",
                equalTo: "Must match with new password"
            }
        }
      });
    



</script>



@stop