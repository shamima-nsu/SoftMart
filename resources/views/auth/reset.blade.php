@extends('app')
@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset your password</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('id'=>'form1', 'url' => '/password/reset', 'method' => 'post')) !!}
                            <fieldset>
                            
                                {!! Form::label('Email', 'Email Address :') !!}
                                {!! Form::email('email',null,['class'=>'form-control']) !!}
                                
                                <br>
                            
                            
                                {!! Form::label('Password', 'Type Your Password :') !!}
                                {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                                <br>
                           
                                {!! Form::label('Password_confirmation', 'Confirm Your Password :') !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                <br>
                                                        
                                 <input type="hidden" name="token" value="{{$token}}">
                                 {!! Form::submit('Reset Password', array('class' => 'btn btn-md btn-info')) !!}<br>
                                 {!! Form::close()!!}

                                 </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            
            email: 
            {
                email: "Please enter valid email address",
                required: "Email field can't be empty"
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
                equalTo: "Must match with password"
            }
        }
      });
    


</script>


@stop



                            
                                
                            