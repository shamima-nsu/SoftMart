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
                        {!! Form::open(array('url' => '/password/email', 'method' => 'post', 'id'=>'form1')) !!}
                            <fieldset>
                                 <fieldset>
                                
                                    {!! Form::label('Email', 'Email:') !!}
                                    {!! Form::email('email', null, array('class' => 'form-control', 'type'=>'email')) !!}
                                    
                                    <br>
                                <?php $token= md5(uniqid(rand()));
                                ?>
                                <input type="hidden" name="_token" value="{{ $token }}">

                                <input type="hidden" name="name" value="Dear member">
                                <input type="hidden" name="email_admin" value="{{$admin->email}}">
                                <input type="hidden" name="name_admin" value="{{$admin->name}}">

                                
                                 {!! Form::submit('Send Password Reset Link', array('class' => 'btn btn-md btn-info')) !!}<br>
                                 {!! Form::close()!!}

                            
                                
                            </fieldset>

                             <!--   <div class="form-group">
                                    {!! Form::open(array('method' => 'post','url' => 'create_account')) !!}
                                    {!! Form::submit('Create New Account', array('class' => 'btn btn-info btn-md btn-block')) !!}
                                    {!! Form::close() !!}
                                </div>-->
                               
    
                                
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
                }
                
        },
        messages:
        {
            
            email: 
            {
                email: "Please enter valid email address",
                required: "Email field can't be empty"
            }
        }
      });
    



</script>


    @stop

