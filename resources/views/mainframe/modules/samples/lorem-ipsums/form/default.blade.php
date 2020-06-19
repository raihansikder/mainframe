@extends('mainframe.layouts.module.form.template')

@section('content')
    <div class="col-md-12 col-lg-10 no-padding">

        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}

        <h3>Text Inputs</h3>
        @include('form.hidden',['var'=>['name'=>'hidden']])
        @include('form.text',['var'=>['name'=>'name','label'=>'input.text','editable'=>true]])
        @include('form.plain-text',['var'=>['name'=>'text','label'=>'Plain text','value'=>'Static value']])

        <?php
        $tags = ['Country', 'Roads', 'Take', 'Me', 'Home'];
        ?>
        @include('form.tags',['var'=>['name'=>'tags','label'=>'input.tags','tags'=>$tags]])

        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'textarea','label'=>'input.textarea']])
        @include('form.textarea',['var'=>['name'=>'textarea_ckeditor','label'=>'input.textarea', 'params'=>['class'=>'ckeditor']]])

        <div class="clearfix"></div>
        <h3>Select from array</h3>

        <?php $types = [null => 'Select', 0 => 'Zero', 1 => 'One', 2 => 'Two']; ?>
        @include('form.select-array',['var'=>['name'=>'select_array','label'=>'select-array', 'options'=>$types]])

        <?php
        /** @noinspection SuspiciousAssignmentsInspection */
        $types = [0 => 'Zero', 1 => 'One', 2 => 'Two'];
        ?>
        @include('form.select-array-multiple',['var'=>['name'=>'select_array_multiple','label'=>'select-array-multiple', 'options'=>$types]])

        <div class="clearfix"></div>
        <h3>Select from a table/module</h3>
        @include('form.select-model',['var'=>['name'=>'dolor_sit_id','label'=>'Dolor sit(select-model)', 'table'=>'dolor_sits']])

        <?php
        $var = [
            'name' => 'dolor_sit_ids',
            'label' => 'Dolor sits (select-model-multiple)',
            'query' => new \App\Mainframe\Modules\Samples\DolorSits\DolorSit(),
        ];
        ?>
        @include('form.select-model-multiple', compact('var'))

        @include('form.select-ajax',['var'=>['label' => 'Parent(select-ajax)', 'name' => 'parent_id', 'table' => 'lorem_ipsums']])

        <div class="clearfix"></div>
        <h3>Checkbox</h3>
        @include('form.checkbox',['var'=>['name'=>'checkbox','label'=>'checkbox']])

        @include('form.is-active')
        {{--    Form inputs: ends    --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>
        @include('form.uploads',['var'=>['limit'=>99]])
    </div>
    <div class="col-md-6 no-padding-l">
        <h5>Comment</h5>
        <small>Add comment</small>
        @include('form.comments',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
{{--    @include('mainframe.modules.samples.lorem-ipsums.form.js')--}}
@endsection