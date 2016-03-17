@extends('app')
@section('content1')
@include('admin_layout')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="col-lg-10">
                <div class="panel-body">
                  
                   
                   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset your password</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => 'reset_password', 'id'=>'form1', 'method' => 'post')) !!}
                            <fieldset>
                               
                                
                                    {!! Form::label('Password_old', 'Current Password :') !!}
                                    {!! Form::password('password_old', ['class'=>'form-control']) !!}
                                    <br>
                                
                                    {!! Form::label('Password', 'New Password :') !!}
                                    {!! Form::password('password', ['id'=>'password', 'class'=>'form-control']) !!}
                                    <br>
                                
                                    {!! Form::label('Password_confirmation', 'Confirm New Password :') !!}
                                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                    <br>

                                
                                 {!! Form::submit('Save change', array('class' => 'btn btn-md btn-info')) !!}
                                 <a href="profile" class="btn btn-default">Cancel</a><br>

                                 {!! Form::close()!!}

                            
                                
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
            <!-- /.col-lg-12 -->
    </div>
        <!-- /.row -->
</div>
    <!-- /#page-wrapper -->

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