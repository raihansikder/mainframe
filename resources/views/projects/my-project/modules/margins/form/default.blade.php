@extends('mainframe.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\Margins\Margin $element
 */
?>

@section('content-top')
    @if($element->vendor_id)
        <a class="btn btn-default" href="{{route('vendors.edit',$element->vendor_id)}}">
            <i class="fa fa-angle-left"></i> Vendor
        </a>
    @endif
    @if($element->product_id)
        <a class="btn btn-default" href="{{route('products.edit',$element->product_id)}}">
            <i class="fa fa-angle-left"></i> Product
        </a>
    @endif
    @if($element->reseller_id)
        <a class="btn btn-default" href="{{route('resellers.edit',$element->reseller_id)}}">
            <i class="fa fa-angle-left"></i> Reseller
        </a>
    @endif

    @if($element->client_id)
        <a class="btn btn-default" href="{{route('clients.edit',$element->client_id)}}">
            <i class="fa fa-angle-left"></i> Client
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
        {{-- **************************************** --}}
        {{-- name --}}
        {{-- @include('form.text',['var'=>['name'=>'name','label'=>'Name','editable'=>false]])--}}
        @include('form.text',['var'=>['name'=>'name_ext','label'=>'Name','div'=>'col-md-6','editable'=>false]])
        <div class="clearfix"></div>

        {{-- vendor_id --}}

        @include('form.select-model',['var'=>['name'=>'vendor_id','label'=>'Vendor/Manufacturer', 'table'=>'vendors','editable'=>!$element->vendor_id]])

        {{-- reseller_id --}}
        @if($element->isResellerSetting())
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner','table'=>'resellers','editable'=>!$element->reseller_id]])
        @endif
        <div class="clearfix"></div>

        {{-- commission_scheme_id  --}}
        @include('form.select-model',['var'=>['name'=>'commission_scheme_id','label'=>'Commission Scheme', 'table'=>'commission_schemes']])

        {{-- percent --}}
        @include('form.text',['var'=>['name'=>'percent','label'=>'Percent','div'=>'col-md-3']])

        @if($element->isUpdating() && !$element->percent)
            {{-- Show calculated percentage if left empty--}}
            @include('form.plain-text',['var'=>['label'=>'Calculated percent', 'value'=>$element->getPercent()]])
        @endif

        @include('form.is-active')
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
    @include('projects.my-project.modules.margins.form.js')


    <?php
    /*
     * Custom redirection after delete
     */
    $deleteSuccessRedirect = route('margins.index');
    if ($user->ofVendor()) {
        $deleteSuccessRedirect = route('vendor.edit', $user->vendor_id);
    }
    if ($user->ofReseller()) {
        $deleteSuccessRedirect = route('reseller.edit', $user->reseller_id);
    }
    ?>

    @if($element->isUpdating())
        <script>
            {{-- Custom redirection after delete --}}
            $('.delete-cta button[name=genericDeleteBtn]')
                .attr('data-redirect_success', '{{$deleteSuccessRedirect}}');

            $('.delete-cta').hide();
        </script>
    @endif
@endsection