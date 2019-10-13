<?php
// use Symfony\Component\VarDumper\VarDumper;
/** @var $invoice \App\Invoice */
?>

<h4>Transaction</h4>
@if($invoice->transaction()->exists())
    <a class="btn btn-default" href="{{route('transactions.edit',$invoice->transaction_id)}}">
        Open transaction {{ pad($invoice->transaction_id)}}
    </a>
    {{Symfony\Component\VarDumper\VarDumper::dump($invoice->transaction->getAttributes())}}

@elseif($invoice->status === 'Due')
    {{ Form::open(['route' => 'transactions.store','name'=>'transactions']) }}
    <input name="invoice_id" type="hidden" value="{{$invoice->id}}"/>
    <input name="redirect_success" type="hidden" value="{{URL::full()}}"/>
    <input name="redirect_fail" type="hidden" value="{{URL::full()}}"/>
    <button class="btn btn-default">Make a payment ({{$invoice->transfer_method}})</button>
    {{ Form::close() }}
@endif
<div class="clearfix"></div>