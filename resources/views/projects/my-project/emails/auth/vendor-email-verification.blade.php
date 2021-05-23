@extends('projects.my-project.layouts.email.template')

@section('title')
    <a href="{{$url}}" style="color:#000; text-decoration:none;">MPH | Email Verification</a>
@endsection

@section('content')
    Dear {{$user->first_name}}, <br><br>

    Thank You for taking the time to register and join our eco system.

    <br />
    <br />
    We welcome new Vendors and look forward to enjoying joint business growth together .
    <br />
    <br />
    However, to ensure success, firstly we need to review your products/software and or services and all up offering is the right fit.  We will be back in touch with you shortly.
    <br />
    <br />
    Successful Vendors will be contacted to arrange demonstrations as the next qualifying stage.
    <br />
    <br />
    Please <a href="{{$url}}">click here</a> to verify your email id.

    <br /><br />
    <strong>MPH Product Team </strong>


@endsection


