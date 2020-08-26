@extends('projects.my-project.layouts.module.form.template')
{{--@extends('mainframe.layouts.module.form.template')--}}
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\ItemDeliveries\ItemDelivery $element
 */
?>

@section('content-top')
    @parent
    @if($element->order_item_id)
        <a class="btn btn-default" href="{{route('order-items.edit',$element->order_item_id)}}">
            <i class="fa fa-angle-left"></i> Order Item
        </a>
    @endif
@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{--        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])--}}
        @include('form.text',['var'=>['name'=>'order_item_id','label'=>'Order Item Id']])
        @include('form.text',['var'=>['name'=>'order_id','label'=>'Order Id','hidden'=>true]])
        @include('form.text',['var'=>['name'=>'product_id','label'=>'Product Id']])
        @include('form.text',['var'=>['name'=>'stock_item_id','label'=>'Stock Item Id']])
        @include('form.text',['var'=>['name'=>'bundle_product_id','label'=>'Bundle Product Id(Parent)']])
        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity']])
        @include('form.text',['var'=>['name'=>'note','label'=>'Note']])
        @include('form.text',['var'=>['name'=>'status','label'=>'Status']])
        {{--  @include('form.text',['var'=>['name'=>'delivered_at','label'=>'Delivered At']])--}}
        @include('form.datetime',['var'=>['name'=>'delivered_at','label'=>'Delivered At']])
        {{--        @include('form.is-active')--}}
        {{--  ******** Form inputs: ends ************ --}}
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{-- <div class="col-md-6 no-padding-l"><h5>File upload</h5><small>Upload one or more files</small>@include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])</div>--}}
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.item-deliveries.form.js')
@endsection