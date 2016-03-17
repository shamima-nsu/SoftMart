<!Doctype html>
<html lang="en" ng-app>
<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    {!!Html::script('public/js/jquery-1.11.3.js')!!}
    
    {!!Html::style('public/css/bootstrap.min.css')!!}


    {!!Html::style('public/css/main.css')!!}
    
    
    {!!Html::style('public/css/plugins/timeline.css')!!}


    {!!Html::style('public/css/admin.css')!!}

    
    {!!Html::script('public/js/sb-admin-2.js')!!}

    {!!Html::script('public/js/jquery.validate.js')!!}
    
    
    {!!Html::script('public/js/metisMenu.min.js')!!}

   {!!Html::script('public/js/bootstrap.min.js')!!}
   


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Software Market Place System</title>

    

    



</head>


<body>
    <div class="content">
        @if (Session::has('message'))
            <div class="flash alert-success">
                <p> <span class="glyphicon glyphicon-ok"></span>&nbsp; &nbsp;{{ Session::get('message') }} </p>
            </div>
        @endif

        @if ($errors->any())
            <div class="flash alert-danger">
                @foreach ($errors->all() as $error)
                    <p> <span class="glyphicon glyphicon-warning-sign"></span>&nbsp; &nbsp;{{ $error }}</p>
                @endforeach
            </div>
        @endif

    @yield('content1')
</body>


</html>