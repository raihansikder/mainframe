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
        <th>UNIT PRICE</th>
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
        $link = route('order-items.edit', $item->id)."?redirect_success=".URL::full();
        if ($editable) {
            $var = [
                'route'            => route('order-items.destroy', $item->id),
                'redirect_success' => URL::full(),
                'value'            => "<i class='fa fa-remove'></i>",
                'params'           => [
                    'class' => 'btn btn-danger btn-xs flat'
                ]
            ];
        }
        ?>
        <tr>
            <td>{{pad($item->id,3)}}</td>
            <td>{{$item->product->sku}}</td>
            <td>
                <a href="{{route('products.show',$item->product_id)}}">{{$item->product->name}}
                    @if($item->promotional_price_id)
                        <span title="Demo unit"> - Demo Unit </span>
                    @endif
                </a>
                @if(isset($item->bundled_products) && count($item->bundled_products))
                    <br><b>Bundle includes</b>
                    <ul class="list-group">
                        @foreach($item->bundled_products as $bundledProduct)
                            <?php
                            /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                            $product = $bundledProduct->product;
                            ?>
                            <li class="list-group-item">
                                <a href="{{route('products.edit',$product->id)}}">
                                    #{{$bundledProduct->product->id}}
                                    - {{$bundledProduct->product->name_ext}}</a> x {{$bundledProduct->quantity}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </td>
            <td>{{Money::sign($item->currency)}}{{Money::print($item->unit_price)}}
                @if($item->promotional_price_id)
                    <span class="badge bg-green" title="Promotional price"> P </span>
                @endif
            </td>
            <td>{{Money::sign($item->currency)}}{{Money::print($item->line_price)}}</td>
            <td>{{$item->quantity}}</td>
            <td style="text-align: right">{{Money::sign($item->currency)}}{{Money::print($item->total)}}</td>
            <td style="text-align: right">
                @if($editable && !isset($element->quote_id))
                    @include('form.delete-button',['var'=>$var])
                @endif
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5"></td>
        <td>Subtotal</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->subtotal)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5" class="no-border"></td>
        <td>Shipping</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->shipping_cost)}}
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5" class="no-border"></td>
        <td>VAT({{$element->vat_percentage}}%)</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->vat)}}
        </td>
        <td></td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="5" class="no-border"></td>
        <td>Total</td>
        <td style="text-align: right">
            {{Money::sign($element->currency)}}{{Money::print($element->grand_total)}}
        </td>
        <td></td>
    </tr>
    </tbody>
</table>