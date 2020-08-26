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
use \App\Projects\MphMarket\Helpers\Money;
?>

<div class="clearfix"></div>

<h3>List of Items</h3>
<table id="tableQuoteItems" class="table">
    <thead>
    <tr id="header">
        <th>REF/SKU</th>
        <th>PRODUCT</th>
        {{--<th>UNIT PRICE</th>--}}
        <th>BUY PRICE</th>
        <th>QTY</th>
        <th style="text-align: right">TOTAL</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($element->order->orderItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('quote-items.edit', $item->id) . "?redirect_success=" . URL::full();
        ?>
        <tr>
            <td>{{$item->product->sku}}</td>
            <td>{{$item->product->name}}</td>
            {{--<td>{{Money::sign($item->currency)}}{{Money::print($item->unit_price)}}</td>--}}
            <td>{{Money::sign($item->currency)}}{{Money::print($item->line_price)}}</td>
            <td>{{$item->quantity}}</td>
            <td style="text-align: right">{{Money::sign($item->currency)}}{{Money::print($item->total)}}</td>
            <td style="text-align: right"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3"></td>
        <td>Subtotal</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->subtotal)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>VAT({{$element->order->vat_percentage}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->vat)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>Shipping</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->shipping_cost)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="3"></td>
        <td>Total</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->grand_total)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="3"></td>
        <td>Payable ( {{$element->percent}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->payable)}}
        </td>
        <td></td>
    </tr>
    </tbody>
</table>