@extends('app')
@section('content1')
@include('admin_layout')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pending Requests</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="col-lg-10">
            <div class="panel-body">
                

@if($num==0)
	<h4>No requests to show</h4>
@else

	<div class="table-responsive">
         <table class="table table-striped table-bordered table-hover" id="dataTables-example">

		<thead>
			<tr style="background-color: aliceblue;">
				<th width="20%">Name</th>
				<th width="20%">Email</th>
				<th width="30%">Requested role / category / skill</th>
				<th colspan="2" width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
	@foreach($requests as $r)
		<?php
			if($r->seen==0)
			{
				$r->seen=1;
				$r->save();
			}
		?>
	<tr>
		@foreach($users as $u)
			@if($u->id== $r->userId)
				<td>{{$u->name}}</td>
				<td>{{$u->email}}</td>		
			@endif
		@endforeach

		@if($r->userRoleId!=null)
			@foreach($roles as $rl)
				@if($r->userRoleId== $rl->id)
					<td><b>Role: </b>&nbsp;{{$rl->role}}</td>
				@endif
			@endforeach
		@elseif($r->category!=null)
			<td><b>Category:</b>&nbsp;{{$r->category}}</td>
		@else
			<td><b>Skill:</b>&nbsp;{{$r->skill}}</td>
		@endif



		<td>
			{!!Form::open(array('class'=>'form-inline', 'url'=>'approve_req' , 'method'=>'PATCH'))!!}
			
			<?php echo "<input type=\"hidden\" name=\"req\" value=\"$r->id\">"; ?>
			
			{!!Form::submit('Approve', array('class'=>'btn btn-sm btn-info'))!!}
			{!!Form::close()!!}
		</td>
		<td>
			{!!Form::open(array('class'=>'form-inline', 'url'=>'reject_req', 'method'=>'PATCH'))!!}
			
			<?php echo "<input type=\"hidden\" name=\"req\" value=\"$r->id\">"; ?>
			{!!Form::submit('Reject', array('class'=>'btn btn-sm btn-warning'))!!}
			{!!Form::close()!!}
		</td>

	</tr>
</tbody>
		

	@endforeach


	</table>
</div>

@endif

 </div>
                      </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->


@stop