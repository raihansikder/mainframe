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
        @include('mainframe.form.input.text',['var'=>['name'=>'name','label'=>'input.text']])


        @include('mainframe.form.input.hidden',['var'=>['name'=>'hidden']])


        @include('mainframe.form.input.textarea',['var'=>['name'=>'textarea','label'=>'input.textarea']])


        @include('mainframe.form.text',['var'=>['name'=>'text','label'=>'Plain text','value'=>'Static value']])


        <?php $types = [0 => 'Zero', 1 => 'One', 2 => 'Two']; ?>
        @include('mainframe.form.select.select-array',['var'=>['name'=>'select_array','label'=>'select-array', 'options'=>$types]])


        @include('mainframe.form.select.select-array-multiple',['var'=>['name'=>'select_array_multiple','label'=>'select-array-multiple', 'options'=>$types]])


        @include('mainframe.form.select.select-model',['var'=>['name'=>'dolor_sit_id','label'=>'Dolor sit(select-model)', 'table'=>'dolor_sits']])


        <?php
        $var = [
            'name' => 'dolor_sit_ids',
            'label' => 'Dolor sits (select-model-multiple)',
            // 'value' => $element->group_ids ?? [],
            'query' => new \App\Mainframe\Modules\DolorSits\DolorSit(),
        ];
        ?>
        @include('mainframe.form.select.select-model-multiple', compact('var'))


        @include('mainframe.form.select.select-ajax',['var'=>['label' => 'Parent(select-ajax)', 'name' => 'parent_id', 'table' => 'lorem_ipsums']])


        @include('mainframe.form.checkbox.checkbox',['var'=>['name'=>'checkbox','label'=>'checkbox']])


        @include('mainframe.form.custom.is_active')
        {{--    Form inputs: ends    --}}

        @include('mainframe.layouts.module.form.includes.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.lorem-ipsums.form.js')
@endsection