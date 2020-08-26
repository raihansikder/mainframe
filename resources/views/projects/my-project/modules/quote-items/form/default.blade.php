@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $element
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

@section('title')
    {{$module->title}}
@endsection

@section('content-top')
    @parent
    @if($element->quote_id)
        <a class="btn btn-default" href="{{route('quotes.edit',$element->quote_id)}}">
            <i class="fa fa-angle-left"></i> Quote
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

        {{-- @include('form.text',['var'=>['name'=>'name','label'=>'Name']])--}}
        @include('form.select-ajax',['var'=>[ 'name' => 'product_id', 'label' => 'Product','table' => 'products']])
        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity']])
        <div class="clearfix"></div>

        <?php
        $label = 'Unit Price '.optional($element->quote)->currency;
        if ($user->isAdmin()) {
            $label .= ' <span class="badge bg-gray"> '.$element->product->priceIn($element->quote->currency).'</span>';
        }
        ?>
        @include('form.text',['var'=>['name'=>'unit_price','label'=>$label]])


        <?php
        $label = 'Margin(%)';
        if ($user->isAdmin()) {
            $label .= '<span class="badge bg-gray"> Default '.$element->marginPercent().'</span>';
        }
        ?>
        @include('form.text',['var'=>['name'=>'margin_percent','label'=>$label, 'editable'=>$marginPercentEditable ]])

        @include('form.text',['var'=>['name'=>'line_price','label'=>'Line Price '. optional($element->quote)->currency]])

        {{-- @include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if(user()->isAdmin())
        @if(isset($element->bundled_products) && count($element->bundled_products))
            <div class="clearfix"></div>
            <h4>Products in bundle</h4>
            <ul class="list-group">
                @foreach($element->bundled_products as $bundledProduct)
                    <?php
                    /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                    $product = $bundledProduct->product;
                    ?>
                    <li class="list-group-item">
                        <a href="{{route('products.edit',$product->id)}}">
                            #{{$bundledProduct->product->id}}
                            - {{$bundledProduct->product->name_ext}}</a>
                        x {{$bundledProduct->quantity}}
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.quote-items.form.js')
    @include('projects.my-project.modules.quote-items.form.price-calculation')
    @if($element->isUpdating())
        <script>
            {{-- Custom redirection after delete --}}
            $('.delete-cta button[name=genericDeleteBtn]')
                .attr('data-redirect_success', '{{route('quotes.edit',$element->quote_id)}}')

        </script>
    @endif
@endsection