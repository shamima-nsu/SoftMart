@extends('app')
@section('content1')

<!--@include('pages.upload_modal')-->


 <!--{!! Form::open(array('url' => 'signin_user', 'method' => 'post', 'name'=>'newForm')) !!}

    <div class="signin_form_users">
        <div class= "form_container">
            <div class="form-group">
                
            {!! Form::label('Email', 'Email:') !!}
            {!! Form::email('email', null, array('class'=>'form-control', 'type'=>'email', 'required'=>'required')) !!}
            
            </div>

            <div class="form-group">
            {!!Form::label('password','Password')!!}
            {!!Form::password('password',array('class'=>'form-control', 'required'=>'required'))!!}
           
           
            </div><br><br>
    </div>
           
      

   
    
        <div class="col col1of3">

            <input name="_token" type="hidden" id="csrf_token" value="{{ csrf_token() }}"/>
            
            <input type="submit" name="submit" id="submit" value="Sign in" class="btn btn-success">

        </div><br>
        <a href="<?php //echo Request::root();?>/signup">Create Account</a>

         <br><a href="reset_user_password">Forgot your password??</a>
        

        {!!Form::close()!!}

        <br><br>-->
        

@stop