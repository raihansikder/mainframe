<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
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
        <th>ID.</th>
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
    @foreach($element->orderItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('order-items.edit', $item->id) . "?redirect_success=" . URL::full();
        if ($editable) {
            $deleteBtnVar = [
                'route' => route('order-items.destroy', $item->id),
                'redirect_success' => URL::full(),
                'value' => "<i class='fa fa-remove'></i>",
                'params' => [
                    'class' => 'btn btn-danger btn-xs flat'
                ]
            ];
        }
        ?>
        <tr>
            <td>{{pad($item->id,3)}}</td>
            <td>{{$item->product->sku}}</td>
            <td><a href="{{route('products.show',$item->product_id)}}">
                    {{$item->product->name}}
                </a></td>
            {{--<td>{{Money::sign($item->currency)}}{{Money::print($item->unit_price)}}</td>--}}
            <td>{{Money::sign($item->currency)}}{{Money::print($item->line_price)}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green" title="Promotional price"> P </span>
                @endif
            </td>
            <td>{{$item->quantity}}</td>
            <td style="text-align: right">{{Money::sign($item->currency)}}{{Money::print($item->total)}}</td>
            <td style="text-align: right">
                @if($editable && !isset($element->quote_id))
                    @include('form.delete-button',['var'=>$deleteBtnVar])
                @endif
            </td>
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
        <td colspan="4" class="no-border"></td>
        <td>Shipping</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->shipping_cost)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4" class="no-border"></td>
        <td>VAT({{$element->vat_percentage}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->vat)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="4" class="no-border"></td>
        <td>Total</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->grand_total)}}
        </td>
        <td></td>
    </tr>
    </tbody>
</table>