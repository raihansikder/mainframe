@extends('projects.my-project.layouts.email.template')

@section('title')
    <a href="{{$url}}" style="color:#000; text-decoration:none;">MPH | Email Verification</a>
@endsection

@section('content')
    Dear {{$user->first_name}}, <br><br>

    Thank You for taking the time to register and join our eco system.
    <br/><br/>

    Please <a href="{{$url}}">click here</a> to verify your email id.

    <br/><br/>
    <strong>MPH Group </strong>


@endsection


