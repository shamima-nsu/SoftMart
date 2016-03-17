<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Approve a new member</h2>

        <div>
            Dear <?php echo $name; ?><br>A new verified member needs to be approved<br>Please follow the link below:<br>
            {!! URL::to('showRequests') !!}.<br/>
           


           

        </div>

    </body>
</html>