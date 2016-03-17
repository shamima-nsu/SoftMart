@extends('app')
@section('content1')



@include('nav')



<div class="container m-xs-top">
    <div class="row">
        <div class="col-sm-9">
            <br>
            <h2 class="m-xs-top m-md-bottom"></h2>
                <p class="m-md-bottom">
                     
                    
                </p>
        </div><br>
    
    <br>

</div>

    
    <div class="row m-xs-top">
        <div class="col-md-3">
            <form>
                <div class="search-form-filters">
                    <div>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/create_message" style="text-decoration: none; color: navy;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;&nbsp;Create new</a></label><hr>
                                
                        </section>


                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/inbox" style="text-decoration: none;"><span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;&nbsp;Inbox&nbsp;&nbsp;({{$inbox_num}})</a></label><hr>
                                
                        </section>



                        <section class="category-filter filter m-md-bottom"><br><br>
                            <label class="control-label"><a href="<?php echo Request::root();?>/sent_messages" style="text-decoration: none;"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;Sent items&nbsp;&nbsp;({{$sent_num}})</a></label><hr>
                        </section>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-8 col-md-offset-1" style="background-color: white; padding: 50px;">

            <section class="js-search-results air-card m-0-top">
                
                <div class="row">
                    <div class="col-sm-12 jobs-list">
                        <div class="pull-left text-left content_display">

                            {!!Form::open(array('method'=>'POST', 'id'=>'form1', 'url'=>'create_message'))!!}

                            
                                {!!Form::label('receiver', 'To :')!!}&nbsp;&nbsp;
                                <select name="receiver" class="form-control">
                                    <option></option>
                                    @foreach($users as $us)
                                        @if($us->userRoleId==3 || $us->userRoleId==4 || $us->userRoleId==5)
                                            @if($us->id!=$user->id)
                                                <option value="{{$us->id}}">{{$us->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select><br>

                                {!!Form::textarea('content', null, ['class'=>'form-control', 'size' => '30x5', 'placeholder'=>'Type your message here...'])!!}<br>
                                
                                <div style="text-align: center;">
                                    {!!Form::submit('Send', ['class'=>'btn btn-info btn-sm'])!!}
                                    <a href="<?php echo Request::root();?>/view_messages/{{$user->id}}" class="btn btn-sm btn-default">Cancel</a>
                                </div>


                            {!!Form::close()!!}
                                
                                
                                 
                                                        

                        </div>
                    </div>
                </div>

            </section>

           

            <br><br>

            <!--<ul class="pagination">
              <li><a href="">«</a></li>
              <li class="active"><a href="" value="1">1</a></li>
              <li><a href="" value="2">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href="">5</a></li>
              <li><a href="">»</a></li>
            </ul>-->

    </div>

</div>

</div>


<script>

    $(document).ready(function() {
      $("#form1").validate({
        rules: {
          content: "required",    // simple rule, converted to {required: true}
          receiver: "required"
        },
        messages: {
          content: "Please enter any text",
          receiver: "Please enter valid recipient"
        }
      });
    });

</script>
<br><br>


@stop