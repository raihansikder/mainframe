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
$stockLabelClass = 'bg-green';
?>

<div class="clearfix"></div>

<h3>List of Items</h3>
<table id="tableQuoteItems" class="table">
    <thead>
    <tr id="header">
        <th>REF/SKU</th>
        <th>PRODUCT</th>
        <th>UNIT PRICE</th>
        <th>BUY PRICE</th>
        <th>QTY <span class="pull-right">(STOCK)</span></th>
        <th style="text-align: right">TOTAL</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($element->order->orderItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('quote-items.edit', $item->id)."?redirect_success=".URL::full();
        ?>
        <tr>
            <td><a href="{{route('order-items.edit',$item->id)}}" target="_blank">{{$item->product->sku}}</a></td>
            <td><a href="{{route('products.show',$item->product_id)}}">{{$item->product->name}}</a>
                @if($item->promotional_price_id)
                    <span title="Demo unit"> - Demo Unit </span>
                @endif
            </td>
            <td>
                {{Money::sign($item->currency)}}{{Money::print($item->unit_price)}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green pull-right" title="Promotional price"> Promo </span>
                @else
                    <span class="badge bg-gray pull-right">{{$item->margin_percent}}%</span>
                @endif
            </td>
            <td>{{Money::sign($item->currency)}}{{Money::print($item->line_price)}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green" title="Promotional price"> P </span>
                @endif
            </td>
            <td>
                {{$item->quantity}}
                <span class="pull-right badge {{$stockLabelClass}}">{{$item->product->current_stock}}</span>
            </td>
            <td style="text-align: right">{{Money::sign($item->currency)}}{{Money::print($item->total)}}</td>
            <td style="text-align: right"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td>Subtotal</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->subtotal)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>VAT({{$element->order->vat_percentage}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->vat)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>Shipping</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->shipping_cost)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="4"></td>
        <td>Total</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->grand_total)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="4"></td>
        <td>Payable ( {{$element->percent}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->payable)}}
        </td>
        <td></td>
    </tr>
    </tbody>
</table>