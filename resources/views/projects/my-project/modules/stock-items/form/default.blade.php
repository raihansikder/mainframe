@extends('projects.my-project.layouts.module.form.template')

<?php
use App\Projects\MphMarket\Modules\StockItems\StockItem;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\StockItems\StockItem $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

$statuses = kv(StockItem::$statuses);

$isLinkedItem = $element->parent_id;

// During creation make the already filled items read-only.
if ($element->isCreating()) {
    if ($element->in_stock_update_id) {
        $immutables[] = 'in_stock_update_id';
    }
    if ($element->out_stock_update_id) {
        $immutables[] = 'out_stock_update_id';
    }

    if ($element->parent_id) {
        $immutables[] = 'parent_id';
    }
}
?>

@section('content-top')
    @if($element->parent_id)
        <a class="btn btn-default" href="{{route('stock-items.edit',$element->parent_id)}}">
            <i class="fa fa-angle-left"></i> Parent Item
        </a>
    @elseif($element->in_stock_update_id)
        <a class="btn btn-default" href="{{route('stock-updates.edit',$element->in_stock_update_id)}}">
            <i class="fa fa-angle-left"></i> Stock Update
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

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        @if($element->stockUpdate && $element->stockUpdate->product )
            @include('form.plain-text',['var'=>[ 'label' => 'Main Product','value'=>$element->stockUpdate->product->name_ext,'div'=>'col-md-6']])
            <div class="clearfix"></div>
        @endif

        {{--in_stock_update_id--}}
        @include('form.text',['var'=>['name'=>'in_stock_update_id','label'=>'Stock Update Id', 'editable'=>$element->isCreating()]])


        @if($isLinkedItem)
            {{--parent_id--}}
            @include('form.text',['var'=>['name'=>'parent_id','label'=>'Linked with main item']])
            <div class="clearfix"></div>
            @include('form.select-ajax',['var'=>[ 'name' => 'product_id', 'label' => 'Linked Secondary Product','table' => 'products', 'name_field'=>'name_ext']])
            <div class="clearfix"></div>
            @include('form.text',['var'=>['name'=>'name','label'=>'Name (If this item is not listed)']])
        @else
            @include('form.hidden',['var'=>['name'=>'product_id','value'=> $element->stockUpdate->product_id]])
        @endif

        @include('form.text',['var'=>['name'=>'code','label'=>'Serial']])
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])

        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'remark','label'=>'Remark']])

        @if($element->isUpdating())
            <div class="col-md-6">
                @include('projects.my-project.layouts.custom.qr-code',['content'=>$element->qrCodeContent()])
            </div>
        @endif

        <div class="clearfix"></div>

        {{--Order items--}}
        <h3>Deliverable</h3>
        <small>If this stock item is sold for an order item you can link that order item with it.</small>
        <div class="clearfix"></div>

        <?php
        $var = [
            'name'            => 'deliverable_id',
            'label'           => 'Deliverable',
            'table'           => 'deliverables',
            'name_field'      => 'name',
            'container_class' => 'col-md-6',
        ];

        ?>
        @include('form.select-ajax',['var'=>$var])

        <?php
        $var = [
            'name'            => 'order_item_id',
            'label'           => 'Order Item',
            'table'           => 'order_items',
            'name_field'      => 'name',
            'container_class' => 'col-md-6',
            'editable'        => false,
        ];
        ?>
        @include('form.select-ajax',['var'=>$var])

        <div class="clearfix"></div>
        @if($element->deliverable)
            <a href="{{route('deliverables.edit',$element->deliverable_id)}}" class="btn btn-default">View Deliverable</a>
        @endif
        @if($element->orderItem)
            <a href="{{route('order-items.edit',$element->order_item_id)}}" class="btn btn-default">View Order Item</a>
            <a href="{{route('orders.edit',$element->order_id)}}" class="btn btn-default">View Order</a>
        @endif

        <div class="clearfix"></div>
        <h3>Warranty</h3>
        @include('form.date',['var'=>['name'=>'warranty_starts_on','label'=>'Warranty Starts On']])
        @include('form.date',['var'=>['name'=>'warranty_ends_on','label'=>'Warranty Ends On']])
        @if(isset($element->product->warranty_option_id))
            @include('form.plain-text',['var'=>['name'=>'','value'=>$element->product->warrantyOption->days,'label'=>'Warranty Days']])
        @endif
        {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if($element->isUpdating() && !$element->parent_id)
        {{-- Linked Stock items --}}
        @if($user->can('view-any', StockItem::class))
            @include('projects.my-project.modules.stock-items.form.includes.section-linked-stock-items')
        @endif
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.stock-items.form.js')
    <script>
        // $('input[name=in_stock_update_id]').attr("disabled", true)
    </script>
@endsection