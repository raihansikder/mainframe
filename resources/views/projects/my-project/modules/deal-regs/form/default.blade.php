@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\DealRegs\DealReg $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
// $statuses = kv(\App\Projects\MphMarket\Modules\DealRegs\DealReg::$statuses);

/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var bool $mutableFields
 */

$statuses = kv(['Draft']);
if (isset($element->status)) {
    $statuses = kv($element->allowedTransitionsOf('status'));
}
?>
@section('title')
    {{$view->formTitle()}}
    @if($view->show('form-list-btn'))
        <a class="btn btn-xs module-list-btn {{$module->name.'-module-list-btn'}}" href="{{route("$module->name.index")}}" data-toggle="tooltip"
           title="View list of {{lcfirst(Str::plural($module->title))}}"><i class="fa fa-list"></i></a>
    @endif
@endsection

@section('content-top')
    @include('projects.my-project.modules.deal-regs.form.includes.top-buttons')
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
        {{--@include('form.is-active')--}}

        @include('form.plain-text',['var'=>['name'=>'id','label'=>'Deal Reg Id','value'=>$element->id]])
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        @if(!$user->ofVendor())
            @include('form.text',['var'=>['name'=>'quote_id','label'=>'Quote No.']])
        @endif
        <div class="clearfix"></div>

        @if($user->ofVendor())
            @include('form.hidden',['var'=>['name'=>'vendor_id','value'=>$user->vendor_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'vendor_id','label'=>'Vendor/Manufacturer', 'table'=>'vendors']])
        @endif

        {{-- reseller_id --}}
        @if($user->ofReseller())
            @include('form.hidden',['var'=>['name'=>'reseller_id','value'=>$user->reseller_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner','table'=>'resellers']])
        @endif

        @include('form.plain-text',['var'=>['name'=>'client_name','label'=>'Client','value'=>$element->client_name]])

        <div class="clearfix"></div>

        <div class="clearfix margin"></div>
        @if($element->created_at)
            @include('form.plain-text',['var'=>['name'=>'created_at','label'=>'Created at','value'=>formatDateTime($element->created_at)]])

            @include('form.plain-text',['var'=>['name'=>'created_by','label'=>'Created by','value'=>$element->creator->name]])
        @endif

        <div class="clearfix"></div>
        @if($element->sent_at)
            @include('form.plain-text',['var'=>['name'=>'sent_at','label'=>'Sent at','value'=>formatDateTime($element->sent_at)]])

            @include('form.plain-text',['var'=>['name'=>'sent_at','label'=>'Sent by','value'=>$element->sender->name]])
        @endif

        <div class="clearfix"></div>
        @if($element->accepted_at)
            @include('form.plain-text',['var'=>['name'=>'accepted_at','label'=>'Accepted at','value'=>formatDateTime($element->accepted_at)]])

            @include('form.plain-text',['var'=>['name'=>'accepted_at','label'=>'Accepted by','value'=>$element->acceptor->name]])
        @endif

        <div class="clearfix"></div>
        @if($element->rejected_at)
            @include('form.plain-text',['var'=>['name'=>'rejected_at','label'=>'Rejected at','value'=>formatDateTime($element->rejected_at)]])

            @include('form.plain-text',['var'=>['name'=>'rejected_at','label'=>'Rejected by','value'=>$element->rejector->name]])
        @endif

        <div class="clearfix"></div>
        @if($element->valid_till)
            <h4>Expiry date</h4>
            @include('form.plain-text',['var'=>['name'=>'valid_from','label'=>'Valid from','value'=>formatDate($element->valid_from)]])
            @include('form.plain-text',['var'=>['name'=>'valid_till','label'=>'Valid till','value'=>formatDate($element->valid_till)]])
        @endif

        <div class="clearfix"></div>
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

    {{--    @include('projects.my-project.modules.deal-regs.form.includes.products')--}}
    @include('projects.my-project.modules.deal-regs.form.includes.quote-items')
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.deal-regs.form.js')

    @if($element->isCreating())
        <script>
            $('#deal-regsSubmitBtn').html("Next  <i class='fa fa-angle-right'></i>")
        </script>
    @endif
@endsection