@extends('app')
@section('content1')

@include('nav')

<div class="all_container">
	<div class="post-container1">

		<form method="post" action="<?php echo Request::root();?>/edit_post" enctype="multipart/form-data" id="form1">
			<input type="text" name="title" class="post_title_styling_view" style="border: none; width: 100%;" value="{{$post->title}}">
			<br>

	        Application Deadline: &nbsp;&nbsp;<em><input type="date" name="deadline" value="{{$post->deadline}}"></em><br><br>
			<h4 class="lead" style="color: #00B85C; font-size: 20px;"><b>Description</b></h4>
			

			<div style="width: 100%; text-align: justify; padding: 20px; line-height: 30px; min-height: 120px;">
				<textarea name="description" rows="4" cols="50" class="description_styling" style="width: 100%; border: none; overflow: hidden;">{{$post->description}}</textarea>
			</div>
			
			<b style="color: green;">Duration:&nbsp;&nbsp;</b>
			@if($post->duration==null)
				<i>Not mentioned</i>&nbsp;&nbsp;
				<select name="duration_part1" class="new_select">
	            <option></option>
	            <?php 

	            for($i=1; $i<=100; $i++)
	            {
	            	echo "<option value=\"$i\">$i</option>";
	            }

	            ?>
	        </select>

	        <select name="duration_part2" class="new_select2">
	            <option></option>
	            <option value="day">day(s)</option>
	            <option value="week">week(s)</option>
	            <option value="month">month(s)</option>
	            <option value="year">year(s)</option>
	        </select>

			@else
				<?php

					$full_part= $post->duration;
					$new_parts= explode(' ', $full_part, 2);


				?>
			
			
			<select name="duration_part1" class="new_select">
	           
	            <option value="{{$new_parts[0]}}">{{$new_parts[0]}}</option>
	            <?PHP for($i=1; $i<=100; $i++)
	                echo "<option value=\"$i\">$i</option>";
	            ?>
	        </select>

	        

	        <select name="duration_part2" class="new_select2">
	            
	            <option value="<?php echo rtrim($new_parts[1], "s");?>">{{$new_parts[1]}}</option>
	            <option value="day">day(s)</option>
	            <option value="week">week(s)</option>
	            <option value="month">month(s)</option>
	            <option value="year">year(s)</option>
	        </select>
	        @endif

	        <input type="hidden" value="{{$post->id}}" name="id">

			<br>


			
		    
		    	@if($file_num==0)
		    		<br><b>You may upload more details :</b><input type="file" name="file" style="margin: 50px;">
		    	@endif
		    


			
			<div style="text-align: center; display: inline-block; margin-left: 35%; margin-top: 50px;">
				<a href="<?php echo Request::root();?>/view_post/{{$post->id}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;Back to original post</a>
				{!!Form::submit('Save Changes', array('class'=>'btn btn-lg btn-success', 'id'=>'sub'))!!}
		
			</div>
		</form>

		



	<div>

<script>

    $(document).ready(function() {
      $("#form1").validate({
        rules: {
          description: "required",    // simple rule, converted to {required: true}
          title: "required"
        },
        messages: {
          description: "Please add a little description",
          title: "Your post must have a title"
        }
      });
    });

</script>





@stop