@extends('projects.my-project.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\PromotionalPrices\PromotionalPrice $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 */
$currencies = kv(['GBP']); // ['GBP','USD','EUR']
$boolenOptions = kv(['0' => 'No', '1' => 'Yes']); //

?>

@section('content-top')
    @if($element->product_id)
        <a class="btn btn-default" href="{{route('products.edit',$element->product_id)}}">
            <i class="fa fa-angle-left"></i> Product
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

        {{--@include('form.text',['var'=>['name'=>'name','label'=>'Name']])--}}
        <div class="clearfix"></div>
        <?php
        $var = [
            'name'  => 'product_id',
            'label' => 'Product',
            'table' => 'products',
            'div'   => 'col-md-9'
        ];
        if ($user->ofReseller()) {
            $var['query'] = DB::table('products')->where('vendor_id', user()->vendor_id);
        }
        ?>
        @include('form.select-ajax',['var'=>$var])
        <div class="clearfix"></div>

        <h4>Prices</h4>
        @include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=> $currencies, 'div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'price','label'=>'Price (GBP)', 'div'=>'col-md-2']])
        @include('form.text',['var'=>['name'=>'price_usd','label'=>'Price (USD)', 'div'=>'col-md-2']])
        @include('form.text',['var'=>['name'=>'price_eur','label'=>'Price (EUR)', 'div'=>'col-md-2']])
        <div class="clearfix"></div>

        <h4>Quantity</h4>
        @include('form.text',['var'=>['name'=>'total_quantity','label'=>'Total Quantity', 'div'=>'col-md-3']])
        @include('form.text',['var'=>['name'=>'max_quantity_per_reseller','label'=>'Max Quantity Per Partner', 'div'=>'col-md-3']])
        @include('form.plain-text',['var'=>['name'=>'quantity_remaining','label'=>'Quantity Remaining', 'div'=>'col-md-3']])
        <div class="clearfix"></div>

        <h4>Dates</h4>
        @include('form.datetime',['var'=>['name'=>'starts_at','label'=>'Starts At']])
        @include('form.datetime',['var'=>['name'=>'ends_at','label'=>'Ends At']])

        <?php
        // Todo: Take calculation outside @blade
        ?>
        @if($element->has_expired)
            @include('form.plain-text',['var'=>['name'=>'has_expired','label'=>'Has Expired', 'div'=>'col-md-3','value'=>'Yes']])
        @else
            @include('form.plain-text',['var'=>['name'=>'has_expired','label'=>'Has Expired', 'div'=>'col-md-3','value'=>'No']])
        @endif

        <div class="clearfix"></div>
        @include('form.textarea',['var'=>['name'=>'description','label'=>'Description','div'=>'col-md-9']])
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
    @include('projects.my-project.modules.promotional-prices.form.js')
@endsection