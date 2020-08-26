<?php
/** @var \App\Projects\MphMarket\Modules\DealRegs\DealReg $element */

use App\Projects\MphMarket\Helpers\Money;
use App\Projects\MphMarket\Modules\QuoteItems\QuoteItem;

$manageItems = false;

$sign = Money::sign($element->quote->currency);

$quoteItems = QuoteItem::where('quote_id', $element->quote_id)
    ->where('vendor_id', $element->vendor_id)
    ->orderBy('product_id')
    ->get();
;

?>

<h4>Products included in this Deal Reg</h4>
@if($element->isUpdating() && $editable && $manageItems)
    <form id="formAddDealRegItem" method="post" action="{{route('deal-reg-items.store')}}">
        @csrf
        <?php
        $var = [
            'name'       => 'product_id',
            'table'      => 'products',
            'name_field' => 'name_ext',
            'url'        => route('products.list-json')
                ."?is_active=1&vendor_id={$element->vendor_id}&deal_reg_id=null&columns_csv=id,name_ext"
        ]
        ?>
        @include('form.select-ajax',['var'=>$var])

        <input type="hidden" name="deal_reg_id" value="{{$element->id}}"/>
        <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
        <input type="hidden" name="redirect_full" value="{{URL::full()}}"/>
        <div class="clearfix"></div>
        <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add To DealReg</button>
    </form>
@endif

<table id="tableQuoteItems" class="table table-hover">
    <thead>
    <tr id="header">
        <th>REF/SKU</th>
        <th>PRODUCT</th>
        <th>OFFER PRICE</th>
        <th>QTY</th>
        <th style="text-align: right">TOTAL</th>

    </tr>
    </thead>
    <tbody>
    @foreach($quoteItems as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\QuoteItems\QuoteItem $item */
        $link = route('quote-items.edit', $item->id)."?redirect_success=".URL::full();
        $unitPrice = Money::print($item->unit_price, $sign);
        $buyPrice = Money::print($item->line_price, $sign);
        $itemTotal = Money::print($item->total, $sign);
        $stockLabelClass = 'bg-green';
        if ($item->product->current_stock <= 0) $stockLabelClass = 'bg-red'
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
            <td>{{$buyPrice}}</td>
            <td>{{$item->quantity}}</td>
            <td style="text-align: right">{{$itemTotal}}</td>

        </tr>
    @endforeach
    </tbody>
</table>