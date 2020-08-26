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
use App\Projects\MphMarket\Helpers\Money;
$sign = Money::sign($element->currency);
$totalItems = $element->quoteItems()->count();
$shippingCost = Money::print($element->shipping_cost, $sign);
$subtotal = Money::print($element->subtotal, $sign);
$vat = Money::print($element->vat, $sign);
$total = Money::print($element->grand_total, $sign);
?>

<div class="clearfix"></div>

<h3 class="pull-left">List of Items</h3>
<button id="splitBtn" class="btn pull-right btn-default"
        data-url="{{route('quotes.split-quote',$element->id)}}"
        data-redirect_success="{{URL::full()}}"
        data-token="{{@csrf_token()}}"
        data-redirect_fail="#" style="margin-top:5px">
    <i class="fa fa-scissors"></i> &nbsp;Split selected items and create new quote
</button>

<form action="#">
    @csrf
    <table id="tableQuoteItems" class="table table-hover">
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
        @foreach($element->quoteItems as $item)
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
                <td>
                    @if($totalItems > 1)
                        <input type="checkbox" name="item_ids[]" value="{{$item->id}}" class="itemCheckBox"/> &nbsp;&nbsp;
                    @endif
                    <a href="{{$link}}">{{$item->product->sku}}</a>
                </td>
                <td>
                    <a href="{{route('products.show',$item->product_id)}}">
                        {{$item->product->name}}
                    </a>
                    @if($item->promotional_price_id)
                        <span title="Demo unit"> - Demo Unit </span>
                    @endif

                    @if(isset($item->bundled_products) && count($item->bundled_products))
                        <ul class="list-group no-margin-b">
                            @foreach($item->bundled_products as $bundledProduct)
                                <?php
                                /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
                                $product = $bundledProduct->product;
                                ?>
                                <li class="list-group-item" style="padding: 5px;">
                                    <a href="{{route('products.edit',$product->id)}}">
                                        #{{$bundledProduct->product->id}}
                                        - {{$bundledProduct->product->name_ext}}</a> x {{$bundledProduct->quantity}}
                                </li>
                            @endforeach
                        </ul>
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
                <td><a href="{{$link}}">{{$item->quantity}}</a>
                    <span class="pull-right badge {{$stockLabelClass}}" style="width: 50%">{{$item->product->current_stock}}</span>
                </td>
                <td style="text-align: right">{{$itemTotal}}</td>
                <td style="text-align: right">
                    @if($element->itemListEditable())
                        <?php
                        $var = [
                            'route'            => route('quote-items.destroy', $item->id),
                            'redirect_success' => URL::full(),
                            'value'            => "<i class='fa fa-remove'></i>",
                            'params'           => [
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
            <td style="text-align: right">{{$subtotal}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>Shipping</td>
            <td style="text-align: right">{{$shippingCost}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>VAT({{$element->vat_percentage}}%)</td>
            <td style="text-align: right">{{$vat}}</td>
            <td></td>
        </tr>
        <tr style="font-weight: bold">
            <td colspan="4"></td>
            <td>Total</td>
            <td style="text-align: right">{{$total}}</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</form>

@section('js')
    @parent
    <script>

        {{-- Initialize button  --}}
        showSplitBtn();
        $('.itemCheckBox').bind('click', function () {
            showSplitBtn();
        });

        /**
         * Get the selected item ids as array
         * @returns {jQuery}
         */
        function selectedItemIds() {
            return $("#tableQuoteItems input:checkbox:checked").map(function () {
                return $(this).val();
            }).get();
        }

        /**
         * Get the selected item ids as array
         * @returns {jQuery}
         */
        function unselectedItemIds() {
            return $("#tableQuoteItems input:checkbox:not(:checked)").map(function () {
                return $(this).val();
            }).get();
        }

        /**
         * Get the number of unselected items
         * @returns int
         */
        function unselectedItemCount() {
            return unselectedItemIds().length;
        }


        /**
         * Check if at least an item is selected
         * @returns {boolean}
         */
        function itemSelected() {
            return !!selectedItemIds().length;
        }

        /**
         * Show/Hide split button based on selection
         */
        function showSplitBtn() {
            // console.log(unselectedItemIds());
            $('#splitBtn').hide();
            if (itemSelected() && unselectedItemCount()) {
                $('#splitBtn').show();
            }
        }

        /**
         * Ajax post split request
         */
        $('#splitBtn').click(function () {
            $(this).html('Working...').prop('disabled', true);

            var url = $(this).data('url');
            var redirect_success = $(this).data('redirect_success');
            var token = $(this).data('token');
            var item_ids = selectedItemIds();

            $.ajax({
                datatype: 'json',
                method: "POST",
                url: url,
                data: {_token: token, redirect_success: redirect_success, item_ids: item_ids}
            }).done(function (ret) {
                ret = parseJson(ret); // Convert the response into a valid json object.
                window.open(ret.redirect); // Open in new tab
             });
        });
    </script>
@endsection