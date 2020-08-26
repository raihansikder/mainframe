@extends('projects.my-project.layouts.email.template')

@section('title')
   <a href="{{$url}}" style="color:#000; text-decoration:none;"> MPH | Email Verification</a>
@endsection

@section('content')
  
        Dear {{$user->first_name}}, <br><br>
           Thank You for taking the time to register and join our eco system.  
            <br>
            <br>
          We welcome you, our new Partner and look forward to enjoying joint business growth together .   
        <br>
            <br>
            We now need to set you up on our system and we will be back in touch with you shortly.

 <br>
            <br>
           Please click on the link below to verify your email id. 

 <br>
            <a class="button button-blue action" href="{{$url}}"> {{__('Verify Email Address')}}</a> 
             <br> <br>
      Thank you, <br>
            MPH Onboarding Team 
    
@endsection
