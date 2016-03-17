@extends('app')
@section('content1')

@include('nav')

<div class="container user-type-page ng-scope" ng-controller="userTypePageController">
    <h1 style="text-align: center;">Get started!</h1><br><br>
        <div class="row">
            
                    
            <div class="col-md-4" style="text-align: center; margin-top: 5%;">
                    
                        
                 
                    <a class="btn btn-newType text-capitalize m-0" href="signup_hire">&nbsp;Hire&nbsp;</a><br><br>
                    <h4>I'm looking for software product suppliers</h4>
                    
                   
                </div>

                <div class="col-md-4 o-or-divider"><img src="public/images/client.jpg" class="img-thumbnail"/></div>

                <div class="col-md-4" style="text-align: center; margin-top: 5%;">
                
                    <a class="btn btn-newType text-capitalize m-0" href="signup_work">Work</a><br>
                    <h4>I'm looking for project work</h4>
                </div>
            </div>
        </div>
        <br><br>
    

   


@stop