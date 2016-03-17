@extends('app')
@section('content1')
@include('admin_layout')



<?php

use App\User_role;
?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Software Categories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="col-lg-7 col-lg-offset-2">
            <div class="panel-body">
                <div class="table-responsive">

                    <table>
                        
                        <tbody>
                            @if($num==0)
                                <?php echo "<h2>No category to show</h2>"; ?>

                                <br>

                                <form action="add_action" method="get" id="form1">
                                  <div class="input-group">
                                    <div class="form-group">
                                     <input type="text" class="form-control" placeholder="Add new" name="newCat">
                                     
                                    </div>
                                    <span class="input-group-btn">
                                      <input class="btn btn-success" type="submit" value="Add">
                                    </span>
                                  </div>
                                </form>
                                <br>
                            @else
                                <h3 style="color: maroon; font-family: cursive;">Showing {{$num}} categories</h3><hr><br>
                                
                                <br>

                                <form action="add_action" method="get" id="form1">
                                  <div class="input-group">
                                     <div class="form-group">
                                     <input type="text" class="form-control" placeholder="Add new" name="newCat">
                                    
                                    </div>
                                    <span class="input-group-btn">
                                      <input class="btn btn-success" type="submit" value="Add">
                                    </span>
                                  </div>
                                </form>
                                <br>
                    
                                  @foreach($softs as $cat)
                                    <tr class="odd gradeX">
                            
                                        <td style="width:100%;"><h4>{{$cat->category}}</h4></td>&nbsp;&nbsp;
                                        <td>
                                          {!!Form::open(array('method'=>'POST', 'onsubmit' => 'return ConfirmDelete()', 'class'=>'form-inline', 'url'=>'delete_category'))!!}
                                          <input type="hidden" name="id" value="{{$cat->id}}">
                                          {!!Form::submit('x', array('class'=>'btn btn-xs'))!!}
                                   
                                          {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endif
                        </tbody>

                    </table>
                <br>
           </div>
       </div>
   </div>
 </div>



 <script>

    $(document).ready(function()
    {
      $("#form1").validate({
        rules: {
                newCat: 
                {
                  required: true
                }
          

        },
        messages: {
                newCat: 
                      {
                        required: "Please enter a category name"
                      }
                
        }
      });
    });
      
</script>

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