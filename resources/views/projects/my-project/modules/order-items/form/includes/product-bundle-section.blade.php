<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\ItemDeliveries\ItemDelivery;
$bundledProducts = $element->bundled_products;
?>
<div class="clearfix"></div>

<div class="col-md-6 no-padding-l">
    <h3 class="pull-left">Products in bundle</h3>

    <a href="{{route('item-deliveries.index')}}?order_item_id={{$element->id}}"
       class="pull-right" style="margin-top:20px">
        View all deliveries of this order item
    </a>

    <table id="ProductBundleTable" class="table datatable-min">
        <thead>
        <tr>
            <th>Product</th>
            <th>Required</th>
            <th>Delivered</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($bundledProducts as $bundledProduct)
            <?php
            /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $bundledProduct */
            $product = $bundledProduct->product;
            $itemDeliveryAddLink = route('item-deliveries.create')
                ."?order_item_id={$element->id}"
                ."&order_id={$element->order_id}"
                ."&product_id={$product->id}"
                ."&bundle_product_id={$element->product_id}"
                ."&quantity=".($bundledProduct->quantity * $element->quantity)
                ."&status=Delivered"
                ."&delivered_at=".now();

            $delivered = ItemDelivery::where('order_item_id', $element->id)->where('product_id', $product->id)->sum('quantity');
            ?>
            <tr>
                <td>
                    <a href="{{route('products.edit',$product->id)}}">
                        #{{$product->id}}
                        - {{$product->name_ext}}</a>
                    x {{$bundledProduct->quantity}}
                </td>
                <td>{{ $element->quantity * $bundledProduct->quantity  }}</td>
                <td>{{$delivered}}</td>
                <td><a href="{{$itemDeliveryAddLink}}" class="btn btn-default bg-blue pull-right"> <i class="fa fa-plus"></i> Delivery </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div class="clearfix"></div>
