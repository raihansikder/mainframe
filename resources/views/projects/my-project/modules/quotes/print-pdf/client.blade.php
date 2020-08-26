@extends('projects.my-project.layouts.pdf-print.quote')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Quotes\Quote $quote */
$total = 0;
?>
@section('header')
@endsection
@section('top')
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <td colspan="2">
                    <h5>QUOTE NUMBER : {{pad($quote->id)}}</h5>
                    <h5>QUOTE DATE : {{formatDate($quote->quoted_at)}}</h5>
                    <h5>VALID : 14 Days</h5>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <h5>CLIENT INFO</h5>
                    @if(($quote->client()->exists()) || isset($quote->billing_company_name,$quote->billing_address1,$quote->billing_city,$quote->billing_zip_code,$quote->billing_country_id))
                        <h6>{{$quote->billing_first_name}}{{" "}}{{$quote->billing_last_name}}</h6>
                        <h6>{{$quote->billing_company_name}}</h6>
                        <h6>{{$quote->billing_address1}},{{$quote->billing_address2}}</h6>
                        <h6>{{$quote->billing_city}}</h6>
                        <h6>{{$quote->billing_county}}</h6>
                        <h6>{{$quote->billing_zip_code}}</h6>
                        <h6>{{$quote->billing_country_name}}</h6>
                    @else
                        <h6>Full client details to be confirmed</h6>
                    @endif
                </td>
                <td width="50%">
                    <h5>DELIVERY ADDRESS</h5>
                    @if(($quote->reseller()->exists()) || isset($quote->shipping_company_name,$quote->shipping_address1,$quote->shipping_city,$quote->shipping_zip_code,$quote->shipping_country_id))
                        <h6>{{$quote->shipping_first_name}}{{" "}}{{$quote->shipping_last_name}}</h6>
                        <h6>{{$quote->shipping_company_name}}</h6>
                        <h6>{{$quote->shipping_address1}},{{$quote->shipping_address2}}</h6>
                        <h6>{{$quote->shipping_city}}</h6>
                        <h6>{{$quote->shipping_county}}</h6>
                        <h6>{{$quote->shipping_zip_code}}</h6>
                        <h6>{{$quote->shipping_country_name}}</h6>
                    @else
                        <h6>Full delivery details to be confirmed</h6>
                        <h6>Pricing may be subject to change once full delivery details are confirmed</h6>
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="20%"><h6>PARTNER REF/SKU</h6></td>
            <td width="30%"><h6>PRODUCT DESCRIPTION</h6></td>
            <td><h6>QUANTITY</h6></td>
            <td><h6>RRP UNIT PRICE</h6></td>
            <td><h6>TOTAL</h6></td>

        </tr>
        </thead>
        <tbody class="tbody-light">
        @foreach($quote->quoteItems as $item)
            <?php $total += Money::format($item->unit_price * $item->quantity) ?>
            <tr>
                <td style="text-align:center"><h6>{{$item->product->sku}}</h6></td>
                <td style="text-align:left"><h6>{{$item->product->name}}</h6></td>
                <td style="text-align:center"><h6>{{$item->quantity}}</h6></td>
                <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->unit_price)}}</h6></td>
                <td style="text-align: right">
                    <h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print(Money::format($item->unit_price * $item->quantity))}}</h6>
                </td>

            </tr>
        @endforeach
        <?php $grandTotal = $total + $quote->vat + $quote->tax + $quote->shipping_cost;?>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>SUBTOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($total)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>SHIPPING</h6></td>
            <td style="text-align: right">
                <h6> {!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->shipping_cost)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>VAT (20%)</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->vat)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>TOTAL</h6></td>
            <td style="text-align: right;">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($grandTotal)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        </tbody>
    </table>
@endsection
@section('content-bottom')
@endsection
@section('footer')
    <table class="no-border no-padding" width="100%" style="margin-top: 80px;">
        <tr>
            <td align="center"><h5>All list prices are valid for 14 days</h5></td>
        </tr>
        <tr>
            <td align="center">
                <small>This Pricing is the current LIST Price and for Information purposes only.</small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>Please Transact via an authorised MPH Group authorised Partner.</small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>MPH Group</small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>Making People Happy</small>
            </td>
        </tr>
        <tr>
            <td align="center">
                <small>Hyper Value Added Distribution</small>
            </td>
        </tr>
    </table>
@endsection
