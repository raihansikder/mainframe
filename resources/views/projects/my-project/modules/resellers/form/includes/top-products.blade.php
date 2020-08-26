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

use App\Projects\MphMarket\Modules\OrderItems\OrderItem;

$products = OrderItem::leftJoin('products', 'order_items.product_id', '=', 'products.id')
    ->select(DB::Raw('products.`id` as pid,products.`name` as pname, COUNT(*) as count'))
    ->whereNull('products.deleted_at')
    ->where('products.is_active', 1)
    ->where('order_items.reseller_id', $element->id)
    ->groupBy('pid')
    ->orderBy('count', 'DESC')
    ->take(10)
    ->get();
$i = 1;
?>
<div class="clearfix"></div>

<h4 class="pull-left">Top 10 Products Ordered</h4>
<table id="tableTopProducts" class="table table-bordered">
    <thead>
    <tr id="header">
        <th>#</th>
        <th>Product</th>
    </tr>
    </thead>
    <tbody>
    @if(count($products))
        @foreach($products as $product)
            <?php
            /** @var \App\Projects\MphMarket\Modules\Products\Product $product */
            $link = route('products.edit', $product->pid);
            ?>
            <tr>
                <td>{{$i++}}</td>
                <td><a href="{{$link}}">{{$product->pname}}</a></td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="2">No product has been ordered</td>
        </tr>
    @endif
    </tbody>
</table>