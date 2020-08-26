@extends('projects.my-project.layouts.pdf-print.invoice')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $invoice */
?>
@section('top')
    <table class="table table-bordered">
        <tr align="left">
            <td width="50%" style="border-bottom-color: transparent">
                <h5>INVOICE DATE</h5>
                <h6>{{formatDate($invoice->invoiced_at)}}</h6>
            </td>
            <td width="50%" align="right">
                <h5>INVOICE NUMBER</h5>
                <h5>MPH{{pad($invoice->id)}}</h5>
                <h5>MPH ID</h5>
                <h5>{{$invoice->mph_id}}</h5>
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="right">
                <h6>Partner PO Reference</h6>
                <h6>{{$invoice->po_reference}}</h6>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <h5>INVOICE TO</h5>
                <h6>{{$invoice->billing_company_name}}</h6>
                <h6>{{$invoice->billing_email}}</h6>
                <h6>{{$invoice->billing_mobile}}</h6>
                <h6>{{$invoice->billing_address1}}</h6>
                <h6>@if(isset($invoice->billing_country_name,$invoice->billing_city)){{$invoice->billing_country_name}}
                    ,{{$invoice->billing_city}}@endif</h6>
            </td>
            <td width="50%" align="right">
                <h5>INVOICE FROM</h5>
                <h6>MPH Group</h6>
                <h6>123 Buckingham Palace Rd,</h6>
                <h6>Victoria, London SW1W 9SH, UK</h6>
            </td>
        </tr>
    </table>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="20%"><h6>PARTNER REF/SKU</h6></td>
            <td width="30%"><h6>PRODUCT DESCRIPTION</h6></td>
            <td><h6>PARTNER BUY PRICE</h6></td>
            <td><h6>QUANTITY</h6></td>
            <td><h6>TOTAL</h6></td>
        </tr>
        </thead>
        <tbody class="tbody-light">
        @foreach($invoice->order->orderItems as $item)
            <tr>
                <td style="text-align:left"><h6>{{$item->product->sku}}</h6></td>
                <td style="text-align:left">
                    <h6>{{$item->product->name}}
                        @if($item->promotional_price_id)
                            <span class="pull-right" title="Demo unit"> - Demo Unit </span>
                        @endif
                    </h6>
                </td>
                <td style="text-align:center"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->line_price)}}
                        @if($item->promotional_price_id)
                            <span class="badge bg-green" title="Promotional price"> P </span>
                        @endif
                    </h6>
                </td>
                <td style="text-align:right"><h6>{{$item->quantity}}</h6></td>
                <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->total)}}</h6>
                </td>
            </tr>
        @endforeach
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>SUBTOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->subtotal)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>SHIPPING</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->shipping_cost)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>VAT (20%)</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->vat)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>TOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->grand_total)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>PAYABLE ( {{$invoice->percent}}%)</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($invoice->currency)) !!}{{Money::print($invoice->payable)}}</h6>
            </td>
        </tr>

        </tbody>
    </table>
@endsection

