<div class="modal fade" id="open_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
    		
    		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Confirm your action</h4>
			</div>

			<div class="modal-body">
				<b>Are you sure you want to make this post open for all?</b>
				<br>
				
				{!!Form::open(array('id'=>'open_form', 'method'=>'Post', 'enctype'=>'multipart/form-data', 'url'=>'open_post'))!!}
				<input type="hidden" name="post_id" value="{{$post->id}}">
				{!!Form::close()!!}
			</div>

			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
				<button type="button" class="btn btn-info" onclick="$('#open_form').submit();">Confirm</button>
			</div>

		</div>
	</div>
</div>