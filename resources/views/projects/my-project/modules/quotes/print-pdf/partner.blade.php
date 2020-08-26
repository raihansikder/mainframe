@extends('projects.my-project.layouts.pdf-print.quote')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Quotes\Quote $quote */
?>

@section('content')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="20%"><h6>PARTNER REF/SKU</h6></td>
            <td width="30%"><h6>PRODUCT DESCRIPTION</h6></td>
            <td><h6>RRP UNIT PRICE</h6></td>
            <td><h6>QUANTITY</h6></td>
            <td><h6>PARTNER BUY PRICE</h6></td>
            <td><h6>TOTAL</h6></td>
        </tr>
        </thead>
        <tbody class="tbody-light">
        @foreach($quote->quoteItems as $item)
            <tr>
                <td style="text-align:center"><h6> {{$item->product->sku}}</h6></td>
                <td style="text-align:left"><h6>{{$item->product->name}}
                        {{--@if($item->promotional_price_id)--}}
                        {{--<span title="Demo unit"> - Demo Unit </span>--}}
                        {{--@endif--}}
                    </h6>
                </td>
                <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->unit_price)}}</h6></td>
                <td style="text-align:center"><h6>{{$item->quantity}}</h6></td>
                <td style="text-align:right">
                    <h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->line_price)}}
                        {{--@if($item->promotional_price_id)--}}
                            {{--<span class="badge bg-green pull-right" title="Promotional price"> Promo </span>--}}
                        {{--@endif--}}
                    </h6>
                </td>
                <td style="text-align: right"><h6>{!! htmlentities(Money::sign($item->currency)) !!}{{Money::print($item->total)}}</h6>
                </td>

            </tr>
        @endforeach
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>SUBTOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->subtotal)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>SHIPPING</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->shipping_cost)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>VAT (20%)</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->vat)}}</h6>
            </td>
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: left"><h6>TOTAL</h6></td>
            <td style="text-align: right;">
                <h6>{!! htmlentities(Money::sign($quote->currency)) !!}{{Money::print($quote->grand_total)}}</h6>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
