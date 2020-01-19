@extends('mainframe.layouts.module.form.template')

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('mainframe.form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('mainframe.form.is-active')
        {{--    Form inputs: ends    --}}
        <div class="clearfix"></div>
        @if($formState === 'edit')
            @include('mainframe.modules.groups.form.permission-blocks')
        @endif

        @include('mainframe.form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.groups.form.js')
@endsection