<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Membership Approval</h2>

        <div>
            {{$user}} , an honorable memeber of your company has just registered at {{$name}}<br>
            Please follow <a href="{{url('approve_user_company/'.$confirmCode)}}">this link</a> to approve the user<br>

            Thank You
            
            
           

        </div>

    </body>
</html>