<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Vendors\Vendor $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Orders\Order;
$orders = Order::where('reseller_id', $element->id)->where('is_active', 1)->get();
?>

<div class="clearfix"></div>

<h4 class="pull-left">Orders</h4>
<div class="clearfix"></div>
<table id="tableOrders" class="table datatable">
    <thead>
    <tr id="header">
        <th>ID</th>
        <th>Order Title</th>
        <th>Client Name</th>
        <th>Partner Name</th>
        <th>Amount</th>
        <th>Shipping Date</th>
        <th>Status</th>
        <th>Updater</th>
        <th>Order Date</th>
        <th>PO Reference</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Orders\Order $order */
        $link = route('orders.edit', $order->id);
        ?>
        <tr>
            <td><a href="{{$link}}">{{$order->id}}</a></td>
            <td><a href="{{$link}}">{{$order->name}}</a></td>
            <td>@if($order->client){{$order->client->name}}@endif</td>
            <td>@if($order->reseller){{$order->reseller->name}}@endif</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->shipping_date}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->updater->name}}</td>
            <td>{{$order->ordered_at}}</td>
            <td>{{$order->po_reference}}</td>

        </tr>
    @endforeach
    </tbody>
</table>