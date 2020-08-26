@extends('projects.my-project.layouts.pdf-print.order')
<?php
use \App\Projects\MphMarket\Helpers\Money;
/** @var \App\Projects\MphMarket\Modules\Orders\Order $order */
$total = 0;
?>

@section('content')
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr style="text-align: center;">
            <td width="15%"><h6>PARTNER REF/SKU</h6></td>
            <td width="50%"><h6>PRODUCT DESCRIPTION</h6></td>
            <td><h6>QUANTITY</h6></td>
            <td><h6>RRP UNIT PRICE</h6></td>
            <td><h6>TOTAL</h6></td>

        </tr>
        </thead>
        <tbody class="tbody-light">
        @foreach($order->orderItems as $item)
            {{$total+=Money::format($item->unit_price * $item->quantity)}}
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
        <?php $grandTotal = $total + $order->vat + $order->tax + $order->shipping_cost;?>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>SUBTOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($order->currency)) !!}{{Money::print($total)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>SHIPPING</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($order->currency)) !!}{{Money::print($order->shipping_cost)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>VAT (20%)</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($order->currency)) !!}{{Money::print($order->vat)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        <tr>
            <td style="border-color: transparent"></td>
            <td style="border-color: transparent"></td>
            <td style="border-left-color: transparent;border-bottom-color: transparent"></td>
            <td style="text-align: right"><h6>TOTAL</h6></td>
            <td style="text-align: right">
                <h6>{!! htmlentities(Money::sign($order->currency)) !!}{{Money::print($grandTotal)}}</h6>
            </td>
            {{--<td></td>--}}
        </tr>
        </tbody>
    </table>
@endsection