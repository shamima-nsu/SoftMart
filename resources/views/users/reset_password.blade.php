@extends('app')
@section('content1')

<div class="val-message val-success">
    <span class="vote-accepted-on" title="success"></span>
        <p class="val-textemphasis">
            Account recovery email sent to {{$email}}
        </p>

        <p>
            Please check your mail to reset your password.
        </p>
</div>

@stop