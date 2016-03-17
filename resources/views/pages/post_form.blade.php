@extends('app')
@section('content1')

@include('nav')


<div class="form_con">

    <h3>Post a job</h3><hr><br>


{!! Form::open(array('method' => 'POST', 'url'=>'new_post', 'id'=>'form1', 'enctype'=>'multipart/form-data')) !!}

    <div class="form-group">
        {!! Form::label('category', 'Choose a category : ') !!}

        <select name="category" class="form-control_new">
            <option></option>
            @foreach($cats as $c)
                <option value="{{$c->id}}">{{$c->category}}</option>
            @endforeach
        </select><br><br>
        <!--<button type="button" class="btn btn-sm btn-success" onclick="newCategory()">Request for new</button>-->
        
        <div class="panel-group" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title" style="text-align: center;">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-size: 15px;">
                            Request for new category
                        </a>
                    </h4>
                </div>

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Category name:
                        {!! Form::text('newCat',null,['class'=>'form-control_new_lil']) !!}
                        
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function()
            {
                $('#collapseOne').collapse('hide');
            });
        </script>

        
    
     
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title :') !!}
        {!! Form::text('title',null,['class'=>'form-control_new']) !!}
        
        
    </div><br>


    <div class="form-group">
        {!! Form::label('description', 'Describe the project :') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control_new', 'size' => '35x3']) !!}
        
    </div><br><br>

    <div class="form-group">
        {!! Form::label('skills', 'Required skills : ') !!}
        <small><i>You can choose multiple (use CTRL)</i></small>

        <select name="skills[]" class="form-control_new" multiple>
            <option></option>
            @foreach($skills as $s)
                <option value="{{$s->id}}">{{$s->skill}}</option>
            @endforeach
        </select>
        <br><br><br><br><br><br>

        <div class="panel-group" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title" style="text-align: center;">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="font-size: 15px;">
                            Request for new skill
                        </a>
                    </h4>
                </div>

                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Skill name:
                        {!! Form::text('newSkill',null,['class'=>'form-control_new_lil']) !!}
                        
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function()
            {
                $('#collapseTwo').collapse('hide');
            });
        </script>
        
        
     
    </div>

    <div class="form-group">
        {!! Form::label('deadline', 'Deadline for applying:') !!}
        {!! Form::date('deadline', null, ['class'=>'form-control_new']) !!}
        
    </div><br>

    <div class="form-group">
        {!! Form::label('file', 'You may attach any additional file :') !!}
        {!! Form::file('file', ['class'=>'form-control_new']) !!}
        
        
    </div><br>

    <div class="form-group">
        {!! Form::label('duration', 'Expected duration for the project : ') !!}

        <select name="duration_part1" class="form_select_1">
            <option></option>
            <?PHP for($i=1; $i<=100; $i++)
                echo "<option value=\"$i\">$i</option>";
            ?>
        </select>

        <select name="duration_part2" class="form_select_2">
            <option></option>
            <option value="day">day(s)</option>
            <option value="week">week(s)</option>
            <option value="month">month(s)</option>
            <option value="year">year(s)</option>
        </select>
        
         
    </div>



    

    <br><br><br>

    
    <div class="form-group" style="margin: 0 auto; text-align: center;">
        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        <a href="display" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
</div>

<script type="text/javascript">

    function newCategory()
    {
        document.getElementById("hidden_textbox").style.visibility = 'visible';
    }

</script>

<script>

   
   
      $("#form1").validate({
        rules: {
                title: 
                {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },    
                description: 
                {             
                    required: true,
                    minlength: 10,
                    maxlength: 2000
                },
                deadline:
                {
                    required: true
                },
                
                duration_part2: {
                    required: true

                }

                
        },
        messages:
        {
            title: 
                {
                    required: "Post title is required",
                    minlength: "Title must contain at least 3 characters",
                    maxlength: "Title should not exceed 100 characters"
                },    
                description: 
                {             
                    required: "Description is required",
                    minlength: "Description must contain at least 10 characters",
                    maxlength: "Description should not exceed 3000 characters"
                },
                deadline:
                {
                    required: "Deadline is required"
                },
                
                duration_part2: {
                    required: "Required"

                }

        }
      });
    



</script>
<br><br>
@include('footer')



@stop
