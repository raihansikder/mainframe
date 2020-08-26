@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
if ($element->isPromoProduct()) {
    $immutables = array_merge($immutables, [
        'unit_price',
        'margin_percent',
        'line_price',
    ]);
}

$marginPercentEditable = $user->isAdmin() && ! in_array('margin_percent', $immutables);
?>

@section('content-top')
    @parent
    @if($element->order_id)
        <a class="btn btn-default" href="{{route('orders.edit',$element->order_id)}}">
            <i class="fa fa-angle-left"></i> Order #{{$element->order_id}}
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

        @if($element->id)
            @include('form.plain-text',['var'=>['name'=>'id','label'=>'Order Item ID']])
        @endif
        <div class="clearfix"></div>

        @include('form.select-ajax',['var'=>[ 'name' => 'product_id', 'label' => 'Product','table' => 'products']])
        @include('form.select-ajax',['var'=>[ 'name' => 'vendor_id', 'label' => 'Vendor','table' => 'vendors', 'div'=>'col-md-3']])
        <div class="clearfix"></div>

        <?php
        $unitPriceLabel = 'Unit Price '.optional($element->order)->currency;
        if ($user->isAdmin()) {
            $unitPriceLabel .= ' <span class="badge bg-gray"> '.$element->product->priceIn($element->order->currency).'</span>';
        }
        ?>
        @include('form.text',['var'=>['name'=>'unit_price','label'=>$unitPriceLabel]])

        <?php
        $marginPercentLabel = 'Margin(%)';
        if ($user->isAdmin()) {
            $marginPercentLabel .= '<span class="badge bg-gray"> Default '.$element->marginPercent().'</span>';
        }
        ?>
        @include('form.text',['var'=>['name'=>'margin_percent','label'=>$marginPercentLabel, 'editable'=>$marginPercentEditable ]])

        @include('form.text',['var'=>['name'=>'line_price','label'=>'Line Price '. optional($element->order)->currency]])
        <div class="clearfix"></div>

        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity']])
        @include('form.plain-text',['var'=>['name'=>'total','label'=>'Total Amount','value'=>$element->total]])
        <div class="clearfix"></div>

{{--        @include('form.text',['var'=>['name'=>'total_delivered','label'=>'Total Delivered']])--}}
{{--        <div class="clearfix"></div>--}}

        @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])

        <div class="col-md-6">
            @include('projects.my-project.layouts.custom.qr-code',['content'=>$element->qrCodeContent()])
        </div>

        {{--@include('form.is-active')--}}
        {{--  ******** Form inputs: ends ************************************ --}}


        @include('projects.my-project.modules.order-items.form.includes.deliverables-section')

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if(user()->isAdmin())

        {{-- Product bundle details --}}
        {{--        @if(isset($element->bundled_products) && count($element->bundled_products))--}}
        {{--            @include('projects.my-project.modules.order-items.form.includes.product-bundle-section')--}}
        {{--        @endif--}}

        {{-- Linked stock items --}}
        {{--        @include('projects.my-project.modules.order-items.form.includes.linked-stock-items-section')--}}
        {{-- @include('projects.my-project.modules.order-items.form.includes.deliverables-section')--}}

    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.order-items.form.js')
    @include('projects.my-project.modules.quote-items.form.price-calculation')

    {{-- Custom redirection after delete --}}
    <script>
        $('.delete-cta button[name=genericDeleteBtn]')
            .attr('data-redirect_success', '{{route('orders.edit',$element->order_id)}}')
    </script>
@endsection