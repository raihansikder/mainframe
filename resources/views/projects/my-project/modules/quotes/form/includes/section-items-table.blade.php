<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
use \App\Projects\MphMarket\Helpers\Money;
$sign = Money::sign($element->currency);
$totalItems = $element->quoteItems()->count();
$shippingCost = Money::print($element->shipping_cost, $sign);
$subtotal = Money::print($element->subtotal, $sign);
$vat = Money::print($element->vat, $sign);
$total = Money::print($element->grand_total, $sign);
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
        <th>QTY</th>
        <th style="text-align: right">TOTAL</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($element->quoteItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('quote-items.edit', $item->id)."?redirect_success=".URL::full();
        $unitPrice = Money::print($item->unit_price, $sign);
        $buyPrice = Money::print($item->line_price, $sign);
        $itemTotal = Money::print($item->total, $sign);
        ?>
        <tr>
            <td><a href="{{$link}}">{{$item->product->sku}}</a></td>
            <td>
                <a href="{{route('products.show',$item->product_id)}}">
                    {{$item->product->name}}
                </a>
                @if($item->promotional_price_id)
                    <span title="Demo unit"> - Demo Unit </span>
                @endif
            </td>
            <td>{{$unitPrice}}</td>
            <td>{{$buyPrice}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green pull-right" title="Promotional price"> Promo </span>
                @else
                    <span class="badge bg-gray pull-right">{{$item->margin_percent}}%</span>
                @endif
            </td>
            <td><a href="{{$link}}">{{$item->quantity}}</a></td>
            <td style="text-align: right">{{$itemTotal}}</td>
            <td style="text-align: right">
                @if($element->itemListEditable())
                    <?php
                    $var = [
                        'route' => route('quote-items.destroy', $item->id),
                        'redirect_success' => URL::full(),
                        'value' => "<i class='fa fa-remove'></i>",
                        'params' => [
                            'class' => 'btn btn-danger btn-xs flat'
                        ]
                    ];
                    ?>
                    @include('form.delete-button',['var'=>$var])
                @endif
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td>Subtotal</td>
        <td style="text-align: right">
            {{$subtotal}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>Shipping</td>
        <td style="text-align: right">
            {{$shippingCost}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>VAT({{$element->vat_percentage}}%)</td>
        <td style="text-align: right">
            {{$vat}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="4"></td>
        <td>Total</td>
        <td style="text-align: right">
            {{$total}}
        </td>
        <td></td>
    </tr>
    </tbody>
</table>