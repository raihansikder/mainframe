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
@section('head')
    <style>
        .info {
            font-size: .85rem
        }

        .info td {
            padding: 0;
            margin: 0;
        }

        .footer td {
            padding: 0;
        }

        small {
            font-size: 70%;
            font-weight: 400
        }
    </style>
@endsection
@section('header')
    <h2 style="padding-right: 10px">PROFORMA INVOICE</h2>
@endsection
@section('top')
        <table class="table table-bordered">
            <tr>
                <td width="50%">
                    <h5>MPH Group</h5>
                    <h6>123 Buckingham Palace Road</h6>
                    <h6>Victoria</h6>
                    <h6>London, SW1W9SH</h6>
                    <br>
                    <h6><a href="https://mphgroup.uk">mphgroup.uk</a></h6>
                    <h6>020 374 56676</h6>
                </td>
                <td width="50%" align="center" style="padding: 0 0 0 0;">
                    <h6 style="background-color: #000000; color: white;line-height: 2;vertical-align: middle">
                        DATE</h6>
                    <h6 style="line-height: 2;vertical-align: middle">{{date_format($invoice->invoiced_at,'l')}},{{formatDate($invoice->invoiced_at)}}</h6>
                    <h6 style="background-color: #000000; color: white;line-height: 2;vertical-align: middle">
                        INVOICE NO</h6>
                    <h6 style="line-height: 2;vertical-align: middle">MPH{{pad($invoice->id)}}</h6>
                    <h6 style="background-color: #000000; color: white;line-height: 2;vertical-align: middle">
                        PO NUMBER</h6>
                    <h6 style="line-height: 2;vertical-align: middle">{{$invoice->po_reference}}</h6>
                    <h6 style="background-color: #000000; color: white;line-height: 2;vertical-align: middle">TERMS
                        OF SALE</h6>
                    <h6 style="line-height: 2;vertical-align: middle">Payment due upon recipient</h6>
                </td>
            </tr>
        </table>
@endsection
@section('content-top')
    {{--<table class="table">--}}
        {{--<tr>--}}
            {{--<td width="50%" style="padding: 0 0 0 0;border-right: 6px solid white">--}}
                {{--<h6 class="upfront-h6">CUSTOMER</h6>--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td style="padding: 0 0 0 0;">--}}
                            {{--<h6 class="line-height-h6">FULL NAME:</h6>--}}
                            {{--<h6 class="line-height-h6">ADDRESS:</h6>--}}
                            {{--<h6 class="line-height-h6">ADDRESS:</h6>--}}
                            {{--<h6 class="line-height-h6">CITY:</h6>--}}
                            {{--<h6 class="line-height-h6">POST CODE:</h6>--}}
                            {{--<h6 class="line-height-h6">COUNTRY:</h6>--}}
                            {{--<h6 class="line-height-h6">VAT NUMBER:</h6>--}}
                        {{--</td>--}}
                        {{--<td style="padding: 0 0 0 10px;">--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_first_name}}{{" "}}{{$invoice->billing_last_name}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_address1}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_address2}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_city}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_zip_code}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->billing_country_name}}</h6>--}}
                            {{--<h6 class="line-height-h6">@if($invoice->reseller){{$invoice->reseller->vat_registration_no}}@endif</h6>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</td>--}}
            {{--<td width="50%" style="padding: 0 0 0 0;">--}}
                {{--<h6 class="upfront-h6">SHIP TO</h6>--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td style="padding: 0 0 0 0;">--}}
                            {{--<h6 class="line-height-h6">FULL NAME:</h6>--}}
                            {{--<h6 class="line-height-h6">ADDRESS:</h6>--}}
                            {{--<h6 class="line-height-h6">ADDRESS:</h6>--}}
                            {{--<h6 class="line-height-h6">CITY:</h6>--}}
                            {{--<h6 class="line-height-h6">POST CODE:</h6>--}}
                            {{--<h6 class="line-height-h6">COUNTRY:</h6>--}}
                        {{--</td>--}}
                        {{--<td style="padding: 0 0 0 16px;">--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_first_name}}{{" "}}{{$invoice->shipping_last_name}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_address1}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_address2}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_city}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_zip_code}}</h6>--}}
                            {{--<h6 class="line-height-h6">{{$invoice->shipping_country_name}}</h6>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
    <table class="table no-border no-margin info">
        <tr>
            <td width="50%" style="padding: 0 0 0 0;border-right: 6px solid white">
                <h6 class="upfront-h6" style="text-align: center;padding-left: 4px;">CUSTOMER</h6>
                <table>
                    <tr>
                        <td style="padding-left: 0">FULL NAME:</td>
                        <td>{{$invoice->billing_first_name}}{{" "}}{{$invoice->billing_last_name}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">ADDRESS:</td>
                        <td style="border: 0;">{{$invoice->generateBillingAddress()}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">POST CODE:</td>
                        <td style="border: 0">{{$invoice->billing_zip_code}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">TELEPHONE:</td>
                        <td style="border: 0">{{$invoice->billing_phone}}</td>
                    </tr>
                </table>
            </td>
            <td width="50%" style="padding: 0 0 0 0;border-right: 6px solid white">
                <h6 class="upfront-h6" style="text-align: center;padding-left: 4px;">SHIP TO</h6>
                <table>
                    <tr>
                        <td style="padding-left: 0">FULL NAME:</td>
                        <td>{{$invoice->shipping_first_name}}{{" "}}{{$invoice->shipping_last_name}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">ADDRESS:</td>
                        <td style="border: 0;">{{$invoice->generateShippingAddress()}}</td>

                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">POST CODE:</td>
                        <td style="border: 0">{{$invoice->shipping_zip_code}}</td>
                    </tr>
                    <tr>
                        <td style="border: 0;padding-left: 0">TELEPHONE:</td>
                        <td style="border: 0">{{$invoice->shipping_phone}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
@section('content')
        <table class="table table-bordered page-break">
            <thead class="thead-dark">
            <tr style="text-align: center;">
                <td width="15%"><h6>PARTNER REF/SKU</h6></td>
                <td width="40%"><h6>PRODUCT DESCRIPTION</h6></td>
                <td><h6>PARTNER BUY PRICE</h6></td>
                <td><h6>QUANTITY</h6></td>
                <td><h6>TOTAL</h6></td>
                <td><h6>RRP UNIT PRICE</h6></td>
            </tr>
            </thead>
            <tbody class="tbody-light">
            @foreach($invoice->order->orderItems as $item)
                <tr>
                    <td style="text-align:left"><h6>{{$item->product->sku}}</h6></td>
                    <td style="text-align:left"><h6>{{$item->product->name}}
                            @if($item->promotional_price_id)
                                <span class="pull-right" title="Demo unit"> - Demo Unit </span>
                            @endif
                        </h6>
                    </td>
                    <td style="text-align:center">
                        <h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->line_price)}}@if($item->promotional_price_id)
                                <span class="badge bg-green" title="Promotional price"> P </span>
                            @endif
                        </h6>
                    </td>
                    <td style="text-align:center"><h6>{{$item->quantity}}</h6></td>
                    <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->total)}}</h6>
                    </td>
                    <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->unit_price)}}</h6>
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
                <td></td>
            </tr>
            <tr>
                <td style="border-color: transparent"></td>
                <td style="border-color: transparent"></td>
                <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
                <td style="text-align: right"><h6>SHIPPING</h6></td>
                <td style="text-align: right">
                    <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->shipping_cost)}}</h6>
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="border-color: transparent"></td>
                <td style="border-color: transparent"></td>
                <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
                <td style="text-align: right"><h6>VAT (20%)</h6></td>
                <td style="text-align: right">
                    <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->vat)}}</h6>
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="border-color: transparent"></td>
                <td style="border-color: transparent"></td>
                <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
                <td style="text-align: right"><h6>TOTAL</h6></td>
                <td style="text-align: right">
                    <h6>{!! htmlentities(Money::sign($invoice->order->currency)) !!}{{Money::print($invoice->order->grand_total)}}</h6>
                </td>
                <td></td>
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