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
$sign = Money::sign($element->currency);
$totalItems = $element->orderItems()->count();
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
        <th>ID.</th>
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
    @foreach($element->orderItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('order-items.edit', $item->id)."?redirect_success=".URL::full();
        $unitPrice = Money::print($item->unit_price, $sign);
        $buyPrice = Money::print($item->line_price, $sign);
        $itemTotal = Money::print($item->total, $sign);

        if ($editable) {
            $varDeleteBtn = [
                'route'            => route('order-items.destroy', $item->id),
                'redirect_success' => URL::full(),
                'value'            => "<i class='fa fa-remove'></i>",
                'params'           => [
                    'class' => 'btn btn-danger btn-xs flat'
                ]
            ];
        }
        $stockLabelClass = 'bg-green';
        if ($item->product->current_stock <= 0) $stockLabelClass = 'bg-red';
        ?>
        <tr>
            <td><a href="{{route('order-items.edit',$item->id)}}" target="_blank">{{pad($item->id,3)}}</a></td>
            <td><a href="{{route('order-items.edit',$item->id)}}" target="_blank">{{$item->product->sku}}</a></td>
            <td>
                <a href="{{route('products.show',$item->product_id)}}">{{$item->product->name}}</a>
                @if($item->promotional_price_id)
                    <span title="Demo unit"> - Demo Unit </span>
                @endif
                @if(isset($item->bundled_products) && count($item->bundled_products))
                    <ul class="list-group no-margin-b">
                        @foreach($item->bundled_products as $bundledProduct)
                            <?php
                            /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                            $product = $bundledProduct->product ?? null;
                            ?>
                            @if($product)
                                <li class="list-group-item" style="padding: 5px;">
                                    <a href="{{route('products.edit',$product->id)}}">
                                        #{{$bundledProduct->product->id}}
                                        - {{$bundledProduct->product->name_ext}}</a> x {{$bundledProduct->quantity}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </td>
            <td>{{$unitPrice}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green pull-right" title="Promotional price"> Promo </span>
                @else
                    <span class="badge bg-gray pull-right">{{$item->margin_percent}}%</span>
                @endif
            </td>
            <td>{{$buyPrice}}</td>
            <td>
                <a href="{{route('order-items.edit',$item->id)}}" target="_blank">{{$item->quantity}}</a>
                <span class="pull-right badge {{$stockLabelClass}}" style="width: 50%">{{$item->product->current_stock}}</span>
            </td>
            <td style="text-align: right">{{$itemTotal}}</td>
            <td style="text-align: right">
                @if($editable && !isset($element->quote_id))
                    @include('form.delete-button',['var'=>$varDeleteBtn])
                @endif
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5"></td>
        <td>Subtotal</td>
        <td style="text-align: right">{{$subtotal}}</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5" class="no-border"></td>
        <td>Shipping</td>
        <td style="text-align: right">{{$shippingCost}}</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5" class="no-border"></td>
        <td>VAT({{$element->vat_percentage}}%)</td>
        <td style="text-align: right">{{$vat}}</td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="5" class="no-border"></td>
        <td>Total</td>
        <td style="text-align: right">{{$total}}</td>
        <td></td>
    </tr>
    </tbody>
</table>