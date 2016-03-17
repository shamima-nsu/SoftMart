@extends('app')
@section('content1')
@include('admin_layout')

<?php
use App\User;
?>

<div class="form_cont">
{!! Form::open(array('method' => 'POST', 'url'=>'store', 'id'=>'form1')) !!}
    
        {!! Form::label('Name', 'Name : ') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        
        <br>
     
    
        {!! Form::label('Email', 'Email Address :') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
        
        <br>
    
   
        {!! Form::label('Password', 'Type Your Password :') !!}
        {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
        <br>
    
        {!! Form::label('Password_confirmation', 'Confirm Your Password :') !!}
        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
       <br>

    

   
        {!!Form::label('user_role', 'You are registering as: ')!!}<br>
     
        <select name="role" class="form-control">

            
            <?php
                foreach($roles as $r){?>
                    <?php if($r->id!=1){?>
                        <option value= <?php echo "\"$r->id\""; ?> > <?php echo $r->role; ?> </option>
                    <?php }}?>
        </select>
        <br><br><br>

    <?php
    $admin= User::where('userRoleId', 1)->first();
    ?>

    <input type="hidden" name="email_admin" value="{{$admin->email}}">
    <input type="hidden" name="name_admin" value="{{$admin->name}}">
    
    <div class="form-group">
        {!! Form::submit('Create Account', ['class' => 'btn btn-info']) !!}
        <a href="profile" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
</div>

<script>

   
   
      $("#form1").validate({
        rules: {
          name: 
                {
                    required: true,
                    minlength: 3
                },    
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
            name: 
            {
                required: "Name is required",
                minlength: "Name must contain at least 3 characters"
            },

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
