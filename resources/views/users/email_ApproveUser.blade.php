<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>

    <?php
        use App\User;
    ?>
    <body>
        <h2>Membership Approval</h2>

        <div>
            <?php 

                $user= User::where('Company_approve_code', $confirmCode)->first(); 

                $admin= User::where('userRoleId', 1)->first();
            ?>

            
            {{$user->name}} , an honorable memeber of your company has just registered at {{$admin->name}}<br>
            Please follow <a href="{{url('approve_user_company/'.$confirmCode)}}">this link</a> to approve the user<br>

            Thank You
            
            
           

        </div>

    </body>
</html>