@extends('projects.my-project.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $element
 */

if (request('parent_id')) {
    $immutables[] = 'parent_id';
}
?>
@section('content-top')
    @if($element->parent_id)
        <a class="btn btn-default" href="{{route('products.edit',$element->parent_id)}}">
            <i class="fa fa-angle-left"></i> Main Bundle Product
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
        {{--  @include('form.text',['var'=>['name'=>'name','label'=>'Name']])--}}

        <?php
        $var = [
            'name'  => 'parent_id',
            'label' => 'Parent Product',
            'table' => 'products',
            'div'   => 'col-md-9'
        ];
        if ($user->ofReseller()) {
            $var['query'] = DB::table('products')->where('vendor_id', user()->vendor_id);
        }
        ?>
        @include('form.select-ajax',['var'=>$var])

        <?php
        $var = [
            'name'  => 'child_id',
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

        @include('form.text',['var'=>['name'=>'quantity','label'=>'Quantity']])
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
    @include('projects.my-project.modules.bundled-products.form.js')
@endsection