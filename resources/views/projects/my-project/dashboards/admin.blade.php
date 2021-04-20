@extends('projects.my-project.layouts.default.template')


@section('head-title')
    Admin Dashboard
@endsection
@section('title')
    Admin Dashboard
@endsection
@section('content')
    Welcome to mainframe

    {{content('sample-content','my-content')}}


    <?php

    use App\Projects\MyProject\DynamicContents\SampleContent;
    $sampleContent = (new SampleContent())->get('body');

    ?>

    <div class="clearfix"></div>
    {!! $sampleContent  !!}


@endsection
