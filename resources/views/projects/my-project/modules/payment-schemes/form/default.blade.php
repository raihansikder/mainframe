@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\PaymentSchemes\PaymentScheme $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        <div class="clearfix"></div>
        <a class="btn btn-default pull-left" href="https://jsoneditoronline.org/#right=local.zelija&left=cloud.2c8cda9906ed4a7fa776b6674ab1bcda">
            Use online JSON Formatter
        </a>
        <div class="clearfix"></div>

        <div class="col-md-6 no-padding">

            <?php
            $value = json_encode($element->custom_conditions);
            ?>
            @include('form.textarea',['var'=>['name'=>'custom_conditions','label'=>'Custom Conditions(JSON)','value'=>$value,'div'=>'col-md-12']])
            <div class="col-md-12">
                @dump($element->custom_conditions)
            </div>
        </div>

        <label class="control-label ">
            Sample JSON for configuring invoice
        </label>
        <pre>
{
  "invoices": [
    {
      "event": "order.status.accepted",
      "percentage": 50,
      "due_after_days": 10
    },
    {
      "event": "order.status.completed",
      "percentage": 50,
      "due_after_days": 30
    }
  ]
}
</pre>


        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'terms','label'=>'Terms & Conditions','editorConfig'=>'','params'=>['class'=>'ckeditor']]])
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])

        @include('form.is-active')
        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--    <div class="col-md-6 no-padding-l">--}}
    {{--        <h5>File upload</h5>--}}
    {{--        <small>Upload one or more files</small>--}}
    {{--        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])--}}
    {{--    </div>--}}
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.payment-schemes.form.js')
@endsection