@extends('projects.mph-market.layouts.email.template')
<?php
/** @var \App\User $user */
$reseller = $user->reseller;
?>


@section('title')
    MPH |  A new Partner Request
@endsection

@section('content')
   
        Dear MPH,<br><br>

        You have a new partner- <b>{{$reseller->name}}</b> request.<br><br>

        Please <a href="{{route('resellers.edit',$user->reseller_id)}}">click here</a> to view it.<br><br>

        MPH Onboarding Team
   
@endsection


