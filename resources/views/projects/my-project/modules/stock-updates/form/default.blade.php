@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\StockUpdates\StockUpdate $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 */
use App\Projects\MphMarket\Modules\StockUpdates\StockUpdate;

$types = StockUpdate::$types;
$events = StockUpdate::$events;

$immutables = array_merge($immutables, ['order_id', 'quote_id', 'quote_item_id']);
?>

@section('content')
    <div class="col-md-12 no-padding">

        @if($element->product_id)
            <a class="btn btn-default" href="{{route('products.edit',$element->product_id)}}">
                <i class="fa fa-angle-left"></i> Product
            </a>
        @endif

        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        {{-- @include('form.text',['var'=>['name'=>'name','label'=>'Name']])--}}
        @include('form.select-ajax',['var'=>[ 'name' => 'product_id', 'label' => 'Product','table' => 'products', 'name_field'=>'name_ext']])

        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'type','label'=>'Stock In/Out','div'=>'col-md-2', 'options'=>kv($types)]])
        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity','div'=>'col-md-1']])
        @include('form.select-array',['var'=>['name'=>'event','label'=>'Event', 'options'=>kv($events)]])
        @include('form.text',['var'=>['name'=>'batch','label'=>'Batch No.']])

        <div class="clearfix"></div>
        {{--@include('form.textarea',['var'=>['name'=>'product_codes','label'=>'A CSV List of Product Codes','div'=>'col-md-5']])--}}
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note','div'=>'col-md-6']])

        <div class="clearfix"></div>

        @if($element->isUpdating() && $element->isOutStock())
            <div class="col-md-6">
                <h4>Links with</h4>
                @include('form.text',['var'=>['name'=>'order_id','label'=>'Order No','div'=>'col-md-4']])
                @include('form.text',['var'=>['name'=>'quote_id','label'=>'Quote No','div'=>'col-md-4']])
                @include('form.text',['var'=>['name'=>'quote_item_id','label'=>'Quote Item No','div'=>'col-md-4']])
            </div>
        @endif
        {{--@include('form.text',['var'=>['name'=>'product_request_id','label'=>'Product Request No.','div'=>'col-md-2']])--}}

        {{--@include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if($element->isUpdating())
        {{-- Stock items --}}
        @if($user->can('view-any', \App\Projects\MphMarket\Modules\StockItems\StockItem::class))
            @include('projects.my-project.modules.stock-updates.form.includes.section-stock-items')
        @endif
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.stock-updates.form.js')
@endsection