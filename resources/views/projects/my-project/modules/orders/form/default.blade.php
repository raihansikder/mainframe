@extends('projects.my-project.layouts.module.form.template')

<?php
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

use App\Projects\MphMarket\Modules\Orders\Order;
use App\Projects\MphMarket\Modules\Resellers\Reseller;
$statuses = kv(['Draft']);

$internal_statuses = kv(Order::$internal_statuses);

if (isset($element->status)) {
    $transitions = $element->processor()->getTransitions();
    $statuses = kv($element->allowedTransitionsOf('status')); // Todo:
}

$vatPercentageTypes = Reseller::$vatPercentageTypes;
$currencies = ['GBP', 'USD', 'EUR'];
$ultimateFinanceOptions = ['0' => 'No', '1' => 'Yes'];

if ($element->isUpdating()) {
// Make the terms field readonly when user is not admin
    if (! $user->isAdmin() && $element->terms) {
        $immutables[] = 'terms';
    }

}
?>
@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')

@endsection

@section('content-top')
    @if($element->isUpdating())
        @include('projects.my-project.modules.orders.form.includes.buttons')
    @endif
@endsection

@section('content')
    <div class="no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}
        @if($element->isUpdating())
            @include('form.plain-text',['var'=>['name'=>'id','label'=>'Order ID','div'=>'col-md-3','value'=>pad($element->id)]])
            @include('form.plain-text',['var'=>['name'=>'mph_id','label'=>'MPH ID']])
            @include('form.plain-text',['var'=>['name'=>'name','label'=>'Order Title','div'=>'col-md-6']])
        @endif

        @if($element->isUpdating())
            <div class="col-md-6 pull-right">
                @include('projects.my-project.layouts.custom.qr-code',['content'=>$element->qrCodeContent()])
            </div>
        @endif

        {{--@include('form.text',['var'=>['name'=>'code','label'=>'Order Number/Code']])--}}

        {{-- reseller_id --}}
        @if($user->ofReseller())
            @include('form.hidden',['var'=>['name'=>'reseller_id','value'=>$user->reseller_id]])
        @else
            @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner','table'=>'resellers']])
        @endif

        {{-- client_id--}}
        <?php

        $addClientLink = route('clients.create').'?redirect_success='.URL::full();
        if (! user()->ofClient()) {
            $label = " &nbsp;&nbsp; + <a class='pull-right' href='$addClientLink'>Add New</a>";
        } else {
            $label = "";
        }//

        $var = [
            'name' => 'client_id',
            'label' => 'Client'.$label,
            'table' => 'clients',
        ];
        if ($user->ofReseller()) {
            $var['query'] = DB::table('clients')->where('reseller_id', user()->reseller_id);
        }
        ?>
        @include('form.select-model',['var'=>$var])
        @include('form.text',['var'=>['name'=>'po_reference','label'=>'PO Reference']])
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        <div class="clearfix"></div>
        @if($element->isUpdating() && $user->isAdmin())
            @include('form.select-array',['var'=>['name'=>'internal_status','label'=>'Internal Status', 'options'=>$internal_statuses]])
        @endif

        @if($element->sent_at)
            @include('form.plain-text',['var'=>['name'=>'sent_at','label'=>'Sent At','value'=>$element->sent_at]])
        @endif
        @if($element->isUpdating())
            {{-- Address --}}
            @include('projects.my-project.modules.orders.form.includes.section-address')
            {{-- Payment and Shipping method--}}
            @include('projects.my-project.modules.orders.form.includes.section-payment-shipping')

            {{-- Terms and note --}}
            @include('projects.my-project.modules.orders.form.includes.section-terms')
            <div class="clearfix"></div>
            {{--delivery_date,delivery_note,created_at,updated_at for admin--}}
            @if(user()->isAdmin() || user()->isAdminL2())
                @include('projects.my-project.modules.orders.form.includes.section-delivery')
            @endif
        @endif
        <div class="clearfix"></div>

        {{--@include('form.is-active')--}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    @if($element->isUpdating())
        <?php
        $sectionItemsView = 'projects.my-project.modules.orders.form.includes.section-items-table';
        if ($user->ofClient()) {
            $sectionItemsView = 'projects.my-project.modules.orders.form.includes.section-items-table-client';
        }
        if ($user->ofReseller()) {
            $sectionItemsView = 'projects.my-project.modules.orders.form.includes.section-items-table-partner';
        }
        ?>
        @include($sectionItemsView)
    @endif

    @if($element->isUpdating() && $editable && !isset($element->quote_id))
        @include('projects.my-project.modules.orders.form.includes.add-item-form')
    @endif
    @if($element->isUpdating())
        @include('projects.my-project.modules.orders.form.includes.section-invoices')
        <div class="col-md-6 no-padding-l">
            @include('projects.my-project.modules.orders.form.includes.section-shipping-labels')
        </div>
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.orders.form.js')
@endsection
