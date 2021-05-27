@extends('mainframe.layouts.module.form.template')

@section('css')
    @parent
    <style>
        #partsTable {margin-bottom: 0;}
        #partsTable > tbody > tr > td {border-top: 0;}
    </style>
@endsection
<?php
/**
 * @var \App\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Content $element
 * @var \App\Content $content
 * @var \App\Mainframe\Modules\Contents\ContentViewProcessor $view
 */
$content = $element;
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.text',['var'=>['name'=>'key','label'=>'Key <code>key-format</code>']])
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'title','label'=>'Title', 'div'=>'col-md-12']])
        @include('form.textarea',['var'=>['name'=>'body','label'=>'Body', 'div'=>'col-md-12', 'class'=>'ckeditor']])

        @include('form.is-active')
        @include('form.tags',['var'=>['name'=>'tags','label'=>'Tags', 'div'=>'col-md-12']])
        {{---------------|  Form input start |-----------------------}}

        <div id="partsBuilder" class="col-md-12 no-padding-l" style="clear: both">

            <h4>Parts</h4>
            <div class="clearfix"></div>

            <table id="partsTable" class="table">
                <tr v-for="(part, i) in parts" :key="i">
                    <td style="width: 20%">
                        <button type="button" v-on:click="removeRow(i)" class="btn btn-default remove-package"><i class="fa fa-close"></i></button>
                        <input type="text" :name="'parts['+i+'][name]'" v-model="part.name"
                               class="validate[required] form-control" placeholder="part-name"/>
                    </td>
                    <td>
                        <textarea type="text" :name="'parts['+i+'][content]'" v-model="part.content"
                                  class="validate[required] form-control" placeholder="content"></textarea>

                    </td>
                </tr>
            </table>
            <div class="clearfix"></div>
            <button type="button" v-on:click="addRow" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Add</button>

            @include('form.hidden',['var'=>['name'=>'parts','label'=>'Parts', 'params'=>['v-model'=>'partsString'],'value'=>($element->parts ?? '[]')]])
        </div>
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5><small>Upload one or more files</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.contents.form.js')
    <script>
        // Todo: Enable CKEditor
        // initEditor('body', {})

        var PartsBuilder = new Vue({
            el: '#partsBuilder',
            data: {
                parts: JSON.parse($("#parts").val())
            },

            computed: {
                partsString: function () {
                    return JSON.stringify(this.parts);
                },
            },
            methods: {
                addRow: function () {
                    this.parts.push({name: 'part-name', content: 'Content'});
                },
                removeRow: function (index) {
                    this.parts.splice(index, 1);
                },
            }
        });
    </script>
@endsection