@extends('app')
@section('content1')


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => 'checkLogin', 'method' => 'post', 'id'=>'form1')) !!}
                            <fieldset>
                                
                                    {!! Form::label('Email', 'Email:') !!}
                                    {!! Form::email('email', null, array('class' => 'form-control', 'type'=>'email')) !!}
                                    
                                    <br>
                                   {!!Form::label('password','Password')!!}
                                   {!!Form::password('password',array('class' => 'form-control', 'type'=>'password'))!!}
                                   <br>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                
                                 {!! Form::submit('Sign in', array('class' => 'btn btn-md btn-success')) !!}<br>
                                 {!! Form::close()!!}

                                <!--<div class="form-group">
                                    {!! Form::open(array('method' => 'post','url' => 'create_account')) !!}
                                    {!! Form::submit('Create New Account', array('class' => 'btn btn-info btn-md btn-block')) !!}
                                    {!! Form::close() !!}
                                </div>-->
                                
                                <br><a href="reset_password">Forgot your password??</a>
    
                                
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


    @stop

