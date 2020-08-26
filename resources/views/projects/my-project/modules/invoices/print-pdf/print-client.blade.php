@extends('projects.my-project.layouts.pdf-print.invoice')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $invoice */
$bankDetails = [
    '1' =>
        [
            'GBP' => 'ultimate-finance-bank-details-gbp',
            'EUR' => 'ultimate-finance-bank-details-eur',
        ],
    '0' =>
        [
            'GBP' => 'bank-details-default',
            'EUR' => 'bank-details-default',
            'USD' => 'bank-details-usd'
        ],

];
?>
@section('top')
        <table class="table table-bordered">
            <tr align="left">
                <td width="50%" style="border-bottom-color: transparent">
                    <h5>INVOICE DATE</h5>
                    <h6>{{formatDate($invoice->invoiced_at)}}</h6>
                </td>
                <td width="50%">
                    <h5>INVOICE NUMBER</h5>
                    <h5>MPH{{pad($invoice->id)}}</h5>
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
                    <td style="text-align:left"><h6>{{$item->product->name}}</h6></td>
                    <td style="text-align:center"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->line_price)}}</h6></td>
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
@section('content-bottom')
    <div class="col-md-12">
        <hr>
        <table>
            <tr>
                <td>
                    @if(!is_null($invoice->has_ultimate_finance) && $invoice->currency)
                        {!! setting($bankDetails[$invoice->has_ultimate_finance][$invoice->currency]) !!}
                    @endif
                    {{--<table>--}}
                    {{--<tr>--}}
                    {{--<td>--}}
                    {{--<h6>Bank Account Name:</h6>--}}
                    {{--<h6>Sort Code:</h6>--}}
                    {{--<h6>Account number:</h6>--}}
                    {{--<h6>IBAN:</h6>--}}
                    {{--<h6>SWIFT:</h6>--}}
                    {{--<h6>VAT number:</h6>--}}
                    {{--<h6>Registration Number:</h6>--}}
                    {{--</td>--}}
                    {{--<td align="left">--}}
                    {{--<h6>MPH Group</h6>--}}
                    {{--<h6>60-83-71</h6>--}}
                    {{--<h6>80588464</h6>--}}
                    {{--<h6>GB50SRLG60837180588464</h6>--}}
                    {{--<h6>SRLGGB2L</h6>--}}
                    {{--<h6>GB 340 4463 27</h6>--}}
                    {{--<h6>12378824</h6>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--</table>--}}

                </td>
                <td style="vertical-align: top">
                    <h6 style="margin-left: 60px;"><b>MPH Group</b></h6>
                    <h6 style="margin-left: 60px;">123 Buckingham Palace Rd</h6>
                    <h6 style="margin-left: 60px;">Victoria,London SW1W 9SH</h6>
                    <h6 style="margin-left: 60px;">020 374 56676</h6>
                    <h6 style="margin-left: 60px;"><a href="https://mphgroup.uk/">www.mphgroup.uk</a></h6>
                </td>
            </tr>
        </table>
        <br>
    </div>
@endsection

