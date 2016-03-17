<div class="modal fade" id="close_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
    		
    		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Confirm your action</h4>
			</div>

			<div class="modal-body">
				<b>Are you sure you want to close this post?</b>
				<br>
				<b style="color: red;">Note :</b> &nbsp;
				<i>This post will be visible but none will be able to comment or submit quotation under this post</i>
				

				{!!Form::open(array('id'=>'close_form', 'method'=>'Post', 'enctype'=>'multipart/form-data', 'url'=>'close_post'))!!}
				<input type="hidden" name="post_id" value="{{$post->id}}">
				{!!Form::close()!!}
			</div>

			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
				<button type="button" class="btn btn-warning" onclick="$('#close_form').submit();">Confirm</button>
			</div>

		</div>
	</div>
</div>