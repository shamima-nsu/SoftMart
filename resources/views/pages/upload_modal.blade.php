<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
    		
    		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Upload a new profile picture</h4>
			</div>

			<div class="modal-body">
				{!!Form::open(array('id'=>'form1', 'method'=>'Post', 'enctype'=>'multipart/form-data', 'url'=>'upload_prof_pic'))!!}
				{!!Form::label('photo', 'Pic : ')!!}
				{!!Form::file('photo')!!}
				{!!Form::close()!!}
			</div>

			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
				<button type="button" class="btn btn-success" onclick="$('#form1').submit();">Upload</button>
			</div>

		</div>
	</div>
</div>

<script>

    $("#form1").validate({
        rules: {
             
                photo: 
                {             
                    required: true
                }
                    
                
        },
        messages:
        {
           
            photo:
            {
            	required: "You must upload a pic"
            }
        }
      });
    </script>
