@extends('mainframe.layouts.default.layout')

@section('title')
    @include('mainframe.layouts.module.form.includes.title')
@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($$element, $formConfig)}}
        @endif

        @yield('form-fields')
        @include('mainframe.layouts.module.form.includes.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.layouts.module.form.includes.js')
@endsection