@extends('app')
@section('content1')
@include('admin_layout')


        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Dashboard</h1><br>

                </div>
                <!-- /.col-lg-12 -->

            </div>
            <?php echo $user->name ?>-<br>
             Welcome to Admin Panel
             
        </div>


@stop