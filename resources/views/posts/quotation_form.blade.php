@extends('app')
@section('content1')

<?php 
use App\User;
use App\Post;

?>

@include('nav')

<div class="form_con">
	<h3>Submit quotation</h3><hr><br>
	{!!Form::open(array('method'=>'POST', 'url'=>'submit_quotation', 'id'=>'form1', 'enctype'=>'multipart/form-data'))!!}

	<div class="form-group">
	    {!! Form::label('content', 'Why should you be selected for this project ? ') !!}<br>
	    {!! Form::textarea('content',null,['class'=>'form-control_text', 'size' => '30x5']) !!}
	    
	   
	     
	</div><br><br>

	<div class="form-group">
	    {!! Form::label('price', 'Please mention the price range you are expecting: ') !!}<br>
	    {!! Form::text('price',null,['class'=>'form-control_text']) !!}
	        
	    
	     
	</div><br><br>

	<div class="form-group">
	    {!! Form::label('file', 'Upload your quotation: ') !!}
	    {!! Form::file('file', ['class'=>'form-control_new']) !!}
	        
	    
	     
	</div><br><br>

	<input type="hidden" name="pid" value="{{$pid}}" >
	<input type="hidden" name="uid" value="{{$user->id}}">

	<?php

		$post_id= Post::where('id', $pid)->first();
		$post_u= $post_id->userId;
		$post_user= User::where('id', $post_u)->first();

	?>

	<input type="hidden" name="post_userId" value="{{$post_u}}" >
	<input type="hidden" name="email" value="{{$post_user->email}}">
	<input type="hidden" name="name" value="{{$post_user->name}}">

	<?php
    	$admin= User::where('userRoleId', 1)->first();
    ?>

    <input type="hidden" name="email_admin" value="{{$admin->email}}">
    <input type="hidden" name="name_admin" value="{{$admin->name}}">
    

	<div class="form-group" >
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
        <a href="{{url('view_post/'.$pid)}}" class="btn btn-default">Cancel</a>
    </div>


	{!!Form::close()!!}

</div>

<script>

   
   
      $("#form1").validate({
        rules: {
          		content: 
                {
                    required: true,
                    minlength: 10
                },    
                price: 
                {             
                    required: true
                },
                file:
                {
                    required: true
                }
                
        },
        messages:
        {
           		content: 
                {
                    required: "This field is required",
                    minlength: "At least 10 characters"
                },    
                price: 
                {             
                    required: "This field is required"
                },
                file:
                {
                    required: "This field is required"
                }
        }
      });
    



</script>

@include('footer')

@stop