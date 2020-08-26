@extends('projects.my-project.layouts.module.form.template')

<?php
use App\Projects\MphMarket\Modules\StockUpdates\StockUpdate;
use \App\Projects\MphMarket\Modules\PromotionalPrices\PromotionalPrice;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Products\Product $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
$categories = [null => 'Select', 0 => 'Zero', 1 => 'One', 2 => 'Two'];
$currencies = kv(['GBP']); // ['GBP','USD','EUR']

/*
 * While creating a new product/variant from a parent fill up some
 * fields from the parent product.
 */
if ($element->isCreating() && $element->parent) {
    $element->fillFromParentProduct();
}

if (request()->keys()) {
    $immutables = array_merge($immutables, request()->keys());
}
?>
@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')
@endsection

@section('content-top')
    @if($element->parent_id)
        <a class="btn btn-default" href="{{route('products.edit',$element->parent_id)}}">
            <i class="fa fa-angle-left"></i> Parent Product
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

        <?php $types = [0 => 'No', 1 => 'Yes']; ?>

        @include('form.select-array',['var'=>['name'=>'is_bundle','label'=>'Bundle Product', 'options'=>$types]])
        <div class="clearfix"></div>

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        <div class="non-bundle-input">
            {{-- Parent/Variant of--}}
            <?php
            $var = [
                'name'       => 'parent_id',
                'label'      => 'Parent Product <small>(This product is a variant of)</small>',
                'table'      => 'products',
                'name_field' => 'name_ext',
                'url'        => route('products.list-json')."?is_active=1&columns_csv=id,name_ext"
            ]
            ?>
            @include('form.select-ajax',['var'=>$var])

            {{-- Shared stock--}}
            @if($user->isAdmin())
                <?php
                $var = [
                    'name'       => 'stock_parent_id',
                    'label'      => 'Shares common stock with:',
                    'table'      => 'products',
                    'name_field' => 'name_ext',
                    'url'        => route('products.list-json')."?is_active=1&columns_csv=id,name_ext"
                ]
                ?>
                @include('form.select-ajax',['var'=>$var])
            @endif
        </div>
        <div class="clearfix"></div>
        {{--            --}}

        @if($user->ofVendor())
            @include('form.hidden',['var'=>['name'=>'vendor_id','value'=>$user->vendor_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'vendor_id','label'=>'Vendor/Manufacturer', 'table'=>'vendors']])
        @endif


        <div class="clearfix"></div>


        @include('form.text',['var'=>['name'=>'name','label'=>'Product Name','div'=>'col-md-6']])
        @include('form.text',['var'=>['name'=>'sku','label'=>'SKU(From Vendor)']])
        @include('form.text',['var'=>['name'=>'code','label'=>'MPH Code']])

        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'model','label'=>'Model']])
        @include('form.text',['var'=>['name'=>'url','label'=>'URL','div'=>'col-md-9']])

        <div class="clearfix"></div>

        {{-- @include('form.text',['var'=>['name'=>'secondary_code','label'=>'Secondary code']])--}}

        <div class="clearfix"></div>
        <h3>Prices</h3>
        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=> $currencies, 'div'=>'col-md-2']])
        @include('form.text',['var'=>['name'=>'price','label'=>'Price (GBP)', 'div'=>'col-md-2']])
        @include('form.text',['var'=>['name'=>'price_usd','label'=>'Price (USD)', 'div'=>'col-md-2']])
        @include('form.text',['var'=>['name'=>'price_eur','label'=>'Price (EUR)', 'div'=>'col-md-2']])
        <div class="clearfix"></div>
        @if($activePromotion = $element->activePromotion())
            <div class="col-md-2" style="padding-left: 0">
                <h4><a href="{{route('promotional-prices.edit',$activePromotion->id)}}">Active Promotion</a> Prices:</h4>
            </div>
            @include('form.plain-text',['var'=>['value'=>$activePromotion->price_gbp, 'div'=>'col-md-2']])
            @include('form.plain-text',['var'=>['value'=>$activePromotion->price_usd, 'div'=>'col-md-2']])
            @include('form.plain-text',['var'=>['value'=>$activePromotion->price_eur, 'div'=>'col-md-2']])
        @endif
        <div class="clearfix"></div>

        {{--Product Information--}}
        @include('projects.my-project.modules.products.form.includes.section-information')

        <div class="clearfix"></div>
        @include('form.select-ajax',['var'=>['name'=>'warranty_option_id','label'=>'Warranty','table'=>'warranty_options','div'=>'col-md-6']])

        <div class="clearfix"></div>
        @if(isset($element->warranty_option_id))
            @include('form.plain-text',['var'=>['name'=>'','value'=>$element->warrantyOption->days,'label'=>'Warranty Days']])
        @endif
        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'warranty','label'=>'Warranty Details (filled from warranty)']])
        <div class="clearfix"></div>
        {{--@include('form.text',['var'=>['name'=>'current_stock','label'=>'Current stock', 'editable'=>false]])--}}
        @include('form.is-active')

        {{--  ******** Form inputs: ends ************************************ --}}
        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">

        <h4>Upload Product Photo</h4>
        <small>Upload one or more files</small>
        @include('form.uploads',['var'=>['type'=>'product-photo','limit'=>1]])

        {{-- variants --}}
        @if($element->showVariantSection())
            @include('projects.my-project.modules.products.form.includes.section-variants')
        @endif

        {{-- Promotional Price --}}
        @if($element->showPromotionalSection())
            @include('projects.my-project.modules.products.form.includes.section-promotional-prices')
        @endif

        {{-- Bundled product --}}
        @if($element->showBundleSection())
            @include('projects.my-project.modules.products.form.includes.section-bundled-products')
        @endif

    </div>

    {{-- Stock updates --}}
    @if($element->showStockSection())
        @include('projects.my-project.modules.products.form.includes.section-stock-updates')
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.products.form.js')

    <script>
        $('#products-redirect-success').val('#'); // Stop redirection after save
    </script>
@endsection