@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Payments\Payment $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 */

$currencies = ['GBP', 'USD', 'EUR'];

$immutables = array_merge($immutables, ['transaction_id']);

if ($invoice = $element->invoice) {

    $element->currency = $invoice->currency;
    $element->original_amount = $invoice->payable;
    $element->percent = 100;
    $element->amount = $invoice->payable;
    $element->paid_at = now();

    $immutables = array_merge($immutables, ['invoice_id', 'currency', 'original_amount', 'percent', 'amount']);
}
?>

@section('content')

    @if($element->invoice)
        <a class="btn btn-default" href="{{route('invoices.show',$element->invoice_id)}}"> <i class="fa fa-angle-left"></i> Invoice </a>
    @endif

    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        @if($element->isUpdating())
            @include('form.plain-text',['var'=>['name'=>'name','label'=>'Title', 'div'=>'col-md-6']])
        @endif
        <div class="clearfix"></div>

        @include('form.text',['var'=>['name'=>'invoice_id','label'=>'Invoice Id']])
        @include('form.date',['var'=>['name'=>'paid_at','label'=>'Payment date']])
        @include('form.select-model',['var'=>['name'=>'payment_method_id','label'=>'Payment Method','table'=>'payment_methods']])

        @include('form.select-array',['var'=>['name'=>'direction','label'=>'Payment Direction', 'options'=>kv(['In','Out'])]])
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv($currencies)]])

        @include('form.text',['var'=>['name'=>'original_amount','label'=>'Total Amount']])
        @include('form.text',['var'=>['name'=>'percent','label'=>'Payment %']])
        @include('form.text',['var'=>['name'=>'amount','label'=>'Payment Amount']])
        @include('form.text',['var'=>['name'=>'transaction_id','label'=>'Transaction id']])
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])
        {{--@include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h4>Payment File upload</h4>
        <small>Upload one or more files related to the payment</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.payments.form.js')
@endsection