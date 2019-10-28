@extends('mainframe.layouts.module.form.layout')

@section('content')
    <div class="col-md-12 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'name','label'=>'Name']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'title','label'=>'Title']])
        @include('mainframe.form-elements.select.select-model',['var'=>['name'=>'parent_id','label'=>'Parent module', 'table'=>'modules']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'level','label'=>'Level']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'order','label'=>'Order']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'color_css','label'=>'Color CSS class']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'icon_css','label'=>'Icon CSS class']])
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'default_route','label'=>'Default route name']])

        <div class="clearfix"></div>
        @include('mainframe.form-elements.text.textarea',['var'=>['name'=>'description','params'=>['class'=>''],'label'=>'Description', 'container_class'=>'col-sm-6']])

        <div class="clearfix"></div>
        @include('mainframe.form-elements.custom.is_active')
        {{--    Form inputs: ends    --}}

        @include('mainframe.layouts.module.form.includes.action-buttons')
        {{ Form::close() }}

    </div>
@endsection



@section('js')
    @parent
    @include('mainframe.modules.module-groups.form.js')
@endsection