@extends('projects.my-project.layouts.module.form.template')

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Invoices\Invoice $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Payments\Payment;
use App\Projects\MphMarket\Modules\Invoices\Invoice;
use App\Projects\MphMarket\Modules\Resellers\Reseller;

$statuses = kv(Invoice::$statuses);
$currencies = ['GBP', 'USD', 'EUR'];
$ultimateFinanceOptions = ['0' => 'No', '1' => 'Yes'];

$vatPercentageTypes = Reseller::$vatPercentageTypes;

$itemsTableView = 'projects.my-project.modules.invoices.form.includes.section-items-table';
if ($user->ofClient()) {
    $itemsTableView = 'projects.my-project.modules.invoices.form.includes.section-items-table-client';
}
if ($user->ofReseller()) {
    $itemsTableView = 'projects.my-project.modules.invoices.form.includes.section-items-table-partner';
}

if ($element->payment) {
    $immutables = array_merge($immutables, ['status']);
}
?>
@section('title')
    @include('projects.my-project.layouts.module.form.includes.title-with-name')
@endsection

@section('content')
    @if($element->hasOrder())
        <a class="btn btn-default" href="{{route('orders.show',$element->order_id)}}"> <i class="fa fa-angle-left"></i> Order </a>
    @endif

    @if($element->isUpdating())
        <div class="col-md-6 pull-right no-padding">
            <div class="btn-group pull-right">
                @if($element->status=="Overdue")
                    <a class="btn btn-default"
                       href="{{route('invoices.send',$element->id).'?type=Reminder'}}">
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp; Send Reminder
                    </a>
                @endif
                {{-- Print --}}
                @if($user->ofClient())
                    <a class="btn btn-default" href="{{route('invoices.print-view',$element->id)."?type=client"}}" target="_blank"><i
                            class="fa fa-print"></i> Print</a>
                @else
                    <a class="btn btn-default" href="{{route('invoices.print-view',$element->id)}}" target="_blank"><i
                            class="fa fa-print"></i> Print</a>
                @endif
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="true">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        {{-- PDF --}}
                        @if($user->ofClient())
                            <li><a href="{{route('invoices.pdf-download',$element->id)."?type=client"}}" target="_blank"><i
                                        class="fa fa-file-pdf-o"></i>PDF</a></li>
                        @else
                            <li><a href="{{route('invoices.pdf-download',$element->id)}}" target="_blank"><i
                                        class="fa fa-file-pdf-o"></i>PDF</a></li>
                        @endif
                        {{-- Send --}}
                        <li><a href="{{route('invoices.send',$element->id)}}"><i class="fa fa-envelope"></i>Send</a>
                    </ul>
                </div>
            </div>
        </div>

    @endif


    <div class="no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********************************** --}}
        {{-- **************************************************************** --}}

        {{--@include('form.plain-text',['var'=>['name'=>'name','label'=>'Invoice Title']])--}}
        {{-- @include('form.text',['var'=>['name'=>'code','label'=>'Invoice Number/Code']])--}}

        @if($element->isUpdating())
            @include('form.plain-text',['var'=>['name'=>'name','label'=>'Invoice Title','div'=>'col-md-6']])

        @endif
        <div class="clearfix"></div>

        @include('form.text',['var'=>['name'=>'order_id','label'=>'Order No.']])
        @include('form.text',['var'=>['name'=>'percent','label'=>'Percent %(For Partial Payment)']])

        @if($element->isUpdating())
            @include('form.plain-text',['var'=>['name'=>'mph_id','label'=>'MPH ID']])
            {{--po_reference--}}
            @include('form.plain-text',['var'=>['name'=>'po_reference','label'=>'PO Reference']])
        @endif
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])

        @if($element->isUpdating())
            {{-- Payment and Shipping method--}}
            @include('projects.my-project.modules.invoices.form.includes.section-payment-shipping')
            {{-- Address --}}
            @include('projects.my-project.modules.invoices.form.includes.section-address')
            {{-- Terms and note --}}
            @include('projects.my-project.modules.invoices.form.includes.section-terms')
            {{-- Created at and updated at for Admin users--}}
            @if(user()->isAdmin() || user()->isSalesAdmin() || user()->isSalesMember())
                @include('form.datetime',['var'=>['name'=>'invoiced_at','label'=>'Invoice date']])
                @include('form.text',['var'=>['name'=>'due_after_days','label'=>'Due after days','div'=>'col-md-3']])
            @endif
            @include('form.date',['var'=>['name'=>'due_on','label'=>'Due Date']])
        @endif

        {{-- @include('form.is-active') --}}

        {{--  ******** Form inputs: ends ************************************ --}}

        @include('form.action-buttons')

        {{-- Items list--}}
        @if($element->isUpdating())
            @include($itemsTableView)
        @endif

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent

    @if($element->isUpdating())
        <h3 class="">Payment
            @if(user()->can('create',Payment::class) && !$element->isPaid())
                <?php
                $createLink = route('payments.create')."?invoice_id={$element->id}";
                ?>
                <a href="{{$createLink}}" class="btn btn-default"> <i class="fa fa-plus"></i> </a>
            @endif
        </h3>

        <div class="clearfix"></div>

        @if(!$element->isPaid())
            @include('projects.my-project.modules.invoices.form.includes.payment-charge')
        @else
            <i class="fa fa-check-circle text-green"></i> This invoice has been paid.

            @if($element->payment)
                <?php
                $payment = $element->payment;
                $transaction = $payment->transaction;
                $transactionId = isset($transaction) ? $transaction->gateway_transaction_id : '';
                $transactionStatus = isset($transaction) ? $transaction->status : '';
                $transactionReceiptUrl = $element->payment->transaction->gateway_response->receipt_url ?? '';
                ?>

                <table class="table table-striped">
                    <tr>
                        <td>
                            @can('update',$payment)
                                <a href="{{route('payments.show',$payment->id)}}">{{pad($payment->id)}}</a>
                            @else
                                {{pad($payment->id)}}
                            @endif
                        </td>
                        <td>{{$payment->name}}</td>
                        <td>{{$payment->paid_at}}</td>
                        <td>{{$transactionId}}</td>
                        <td>{{ucfirst($transactionStatus)}}</td>
                        <td>
                            @if($transactionReceiptUrl)
                                <a target="_blank" href="{{$transactionReceiptUrl}}">Receipt</a>
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="clearfix"></div>
                {{-- {{dump($element->payment->transaction)}}--}}
            @endif
        @endif
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.invoices.form.js')
@endsection
