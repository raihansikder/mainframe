@extends('projects.my-project.layouts.default.template')
{{-- Master view file for report --}}

@section('head')
    @parent
    <style>
        .nav-tabs-custom > .tab-content {
            padding: 0;
        }
    </style>
@endsection

@section('title')
@endsection


@section('js')
    @parent
    <script type="text/javascript">
        $('#right-side').addClass('stretch');
        $('#left-side').addClass('collapse-left');
    </script>
@endsection