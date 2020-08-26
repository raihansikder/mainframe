@extends('projects.my-project.layouts.module.form.template')
{{--@extends('mainframe.layouts.module.form.template')--}}
<?php
use App\Projects\MphMarket\Modules\Deliverables\Deliverable;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\Deliverables\Deliverable $element
 */

$statues = kv(Deliverable::$statuses);


if ($user->isNonAdmin()) {
    $editable = false;
}

?>

@section('content-top')
    @parent
    @if($element->order_item_id)
        <a class="btn btn-default" href="{{route('order-items.edit',$element->order_item_id)}}">
            <i class="fa fa-angle-left"></i> Order Item
        </a>
    @endif

    @if($element->stockItem && $user->isAdmin())
        <a class="btn btn-default" href="{{route('stock-items.edit',$element->stockItem->id)}}">
            Stock Item/Serial <i class="fa fa-angle-right"></i>
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
        @include('form.plain-text',['var'=>['name'=>'name','label'=>'Name', 'div'=>'col-md-6', 'editable'=>false]])
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'order_item_id','label'=>'Order Item Id','editable'=>false]])
        @include('form.text',['var'=>['name'=>'order_id','label'=>'Order Id','hidden'=>true,'editable'=>false]])
        @include('form.text',['var'=>['name'=>'product_id','label'=>'Product Id','editable'=>false]])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'bundle_product_id','label'=>'Bundle Product Id(Parent)','editable'=>false]])
        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity','editable'=>false]])

        <div class="clearfix"></div>
        {{--@include('form.text',['var'=>['name'=>'stock_item_id','label'=>'Stock Item Id']])--}}
        <?php $statues = kv(Deliverable::$statuses); ?>
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statues]])

        {{--  @include('form.text',['var'=>['name'=>'delivered_at','label'=>'Delivered At']])--}}
        @include('form.datetime',['var'=>['name'=>'delivered_at','label'=>'Delivered At']])
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'note','label'=>'Note','div'=>'col-md-6']])

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
    @include('projects.my-project.modules.deliverables.form.js')
@endsection