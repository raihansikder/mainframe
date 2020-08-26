@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\ConversionRates\ConversionRate $element
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

        @include('form.text',['var'=>['name'=>'name','label'=>'Name', 'editable'=>false]])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'rate_usd_eur','label'=>strtoupper('1 usd = ? eur')]])
        @include('form.text',['var'=>['name'=>'rate_usd_gbp','label'=>strtoupper('1 usd = ? gbp')]])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'rate_eur_usd','label'=>strtoupper('1 eur = ? usd')]])
        @include('form.text',['var'=>['name'=>'rate_eur_gbp','label'=>strtoupper('1 eur = ? gbp')]])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'rate_gbp_usd','label'=>strtoupper('1 gbp = ? usd')]])
        @include('form.text',['var'=>['name'=>'rate_gbp_eur','label'=>strtoupper('1 gbp = ? eur')]])

        <div class="clearfix"></div>
        @if($element->isUpdating())
            <div class="col-md-6 no-padding">
                <h4>See OpenExchange rate ({{$element->created_at}})</h4>
                <?php Symfony\Component\VarDumper\VarDumper::dump($element->data); ?>
            </div>
        @endif
        {{--@include('form.is-active')--}}

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
    @include('projects.my-project.modules.conversion-rates.form.js')
@endsection