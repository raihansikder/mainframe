<?php
/** @var \App\Purchase $purchase */
?>
<div class="clearfix"></div>
<b>Purchase details</b>

<table class="table table-condensed no-border">
    <tbody>
    <tr>
        <td width="100px"><b>Purchase #</b></td>
        <td>{{pad($purchase->id,8)}}</td>
        <td><b>Recommender</b></td>
        <td>{{$purchase->user->full_name}}</td>
        <td></td>
        <td>{{$purchase->user->email}}</td>
    </tr>
    <tr>
        <td><b>Order #</b></td>
        <td>{{$purchase->product_order_id}}</td>
        <td><b>Time</b></td>
        <td>{{$purchase->purchased_at}}</td>
        <td></td>
        <td>
        </td>
    </tr>
    <tr>
        <td><b>Product</b></td>
        <td>{{$purchase->product_name}}</td>
        <td><b>SKU</b></td>
        <td>{{$purchase->product_sku}}</td>
        <td><b>Price</b></td>
        <td>
            {{symbol($purchase->product_currency).money($purchase->product_price_in_product_currency)}} (in
            site currency)
        </td>
    </tr>
    <tr>
        <td><b>Quantity</b></td>
        <td>{{$purchase->product_quantity}}</td>
        <td><b>Product ID</b></td>
        <td>{{$purchase->product_id}}</td>
        <td><b></b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Title</b></td>
        <td>{{$purchase->product_title}}</td>
        <td><b>Line price</b></td>
        <td>{{$purchase->product_line_price}}</td>
        <td><b>Vendor</b></td>
        <td>{{$purchase->product_vendor}}</td>
    </tr>
    </tbody>
</table>
<div class="clearfix"></div>
<table class="table table-condensed no-border">
    <tbody>
    <tr>
        <td width="100px"><b>Product url</b></td>
        <td>
            <a href="{{$purchase->product_url}}" target="_blank">
                {{$purchase->product_url}}
            </a>
        </td>
    </tr>
    <tr>
        <td><b>Checkout url</b></td>
        <td>
            @if(strlen($purchase->checkout_url))
                <a href="{{$purchase->checkout_url}}" target="_blank">{{$purchase->checkout_url}}</a>
            @endif
        </td>
    </tr>
    <tr>
        <td><b>LB Share url</b></td>
        <td>
            @if(strlen($purchase->product_lb_url))
                <a href="{{$purchase->product_lb_url}}" target="_blank">{{$purchase->product_lb_url}}</a>
            @endif
        </td>
    </tr>
    </tbody>
</table>