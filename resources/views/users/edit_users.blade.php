@extends('app')
@section('content1')
@include('admin_layout')


<?php

use App\User_role;
?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr style="background-color:aliceblue; font-size: 12px;">
                            <th width="15%">Name</th>
                            <th width="15%">Email</th>
                            <th width="10%">User role</th>
                            <th colspan="5" width="30%">Actions</th>
                            
                            

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $u)
                            @if($u->approved==1)

                                <?php $r= User_role::find($u->userRoleId); ?>

                                <tr class="odd gradeX" style="font-size: 12px;">
                                    <td>{!! $u->name !!}</td>
                                    <td>{!! $u->email !!}</td>
                                    <td>{!! $r->role !!}</td>
                                    <td>

                                        {!!Form::open(array('method'=>'Post', 'class'=>'form-inline', 'onsubmit' => 'return ConfirmDelete()', 'route'=>array('delete_user')))!!}
                                        <input type="hidden" name="id" value="{{$u->id}}">
                                        {!!Form::submit('Delete', ['class'=>'btn btn-sm btn-danger'])!!}  
                                        {!!Form::close()!!}
                                    </td>
                                    <td>
                                        
                                        
                                           {!!Form::open(array('method'=>'PATCH', 'class'=>'form-inline', 'route'=>array('users.update', $u)))!!}
                                           
                                            <select name="role" class="form-control">
                    
                                              <option value="{{$u->userRoleId}}"></option>
                                              <?php
                                                  foreach($roles as $r){
                                                    if($r->id!=1){
                                                ?>
                                                    <option value= <?php echo "\"$r->id\""; ?> > <?php echo $r->role; ?> </option>
                                                  <?php }
                                              }
                                              ?>
                                           </select>

                                            {!!Form::submit('Change role', array('class'=>'btn btn-sm btn-info'))!!}
                                       
                                            {!!Form::close()!!}
                                          
                                         
                                       </td>
                                        </div>

                                        
                                     </td>
          
                                </tr>
                                @endif

                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<script>

  function ConfirmDelete()
  {
    var x = confirm("Are you sure you want to delete this user permanently?");
    if (x)
      return true;
    else
      return false;
  }

</script>



@stop
