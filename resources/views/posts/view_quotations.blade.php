@extends('app')
@section('content1')

@include('nav')

<ul class="list-unstyled">

		<div style="text-align: center; background-color: white;">
			<br><h2>All Submissions</h2><hr><br>
		</div>

		@foreach($quots as $q)
		
			@if($q->postId==$pid)
			<li>
				<div class="quot_con">
				@foreach($users as $u)
					@if($u->id== $q->vendorId)
						
							@foreach($com as $c)
								@if($c->id==$u->companyId)
									<b>Company name: </b> &nbsp; &nbsp;<a href="http://{{$c->websiteUrl}}">{{$c->name}}</a><br>
									<br>
								@endif
							@endforeach
						

						<b>Quotation submitted by: </b>&nbsp; &nbsp;<a href="{{url('user_profile/'.$u->id)}}">{{$u->name}}</a><br>
						<?php $uname= $u->name; ?>
					@endif
				@endforeach
				
				@if($q->content!=null)
					<br><br>
					<blockquote class="pull-right" style="font-family: cursive; font-size: 16px;"><p><i>"{{$q->content}}"</i></p><p><small>{{$uname}}</small></p></blockquote><br><br><br>
				@endif

				<br><br><b>Estimated cost :</b>&nbsp;&nbsp;{{$q->price}}
			
				<br><br>
				@foreach($files as $f)
					@if($f->quotationId==$q->id)
						<a href="download_attachment/{{$q->id}}"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;&nbsp;{{$f->filename}}</a>
					@endif
				@endforeach
			</div>
			</li>

			@endif
		
		@endforeach
		<br><br>
	</ul>
	



@stop