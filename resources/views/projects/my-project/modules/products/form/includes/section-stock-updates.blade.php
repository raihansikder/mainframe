<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 3/18/2020
 * Time: 8:43 PM
 */
use App\Projects\MphMarket\Modules\Products\Product;
use App\Projects\MphMarket\Modules\StockUpdates\StockUpdate;
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Products\Product $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

/*
 * Create button link
 */
$createBtnLink = route('stock-updates.create')
    .'?product_id='.$element->id;
// ."&redirect_success=".URL::full()

/*
 * List of stock updates.
 * ----------------------
 * This includes the updates of child products that shares stock
 * wit this parent product.
 */

// $stockUpdates = $element->stockUpdates; // Old
$productIds = array_merge([$element->id], $element->getSharedStockProductIds());
$stockUpdates = StockUpdate::with('product')->whereIn('product_id', $productIds)->orderBy('created_at','desc')->take(100)->get();
?>

<div class="col-md-6 border-dotted " style="padding-top:15px;">
    <h4 class="pull-left">Current stock : {{$element->current_stock}}

        @if($element->stock_parent_id)
            <a href="{{route('products.edit',$element->stock_parent_id)}}"><span class="label label-primary">Shared</span></a>
        @endif

        @if($element->is_bundle)
            <span class="label label-primary">Bundle</span>
        @endif

    </h4>

    <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Create a new entry">
        <i class="fa fa-plus"></i>
    </a>
    @if($element->id)
        <a class="btn btn-light pull-right" href="{{route('stock-updates.index').'?product_id='.$element->id}}" title="View All">
            View All
        </a>
    @endif

    <table id="tableStockUpdates" class="table datatable-min">
        <thead>
        <tr id="header">
            <th>No.</th>
            <th>Type</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stockUpdates as $stockUpdate)
            <?php
            /** @var \App\Projects\MphMarket\Modules\StockUpdates\StockUpdate $stockUpdate */
            $link = route('stock-updates.edit', $stockUpdate->id);
            ?>
            <tr>
                <td><a href="{{$link}}">{{pad($stockUpdate->id,3)}}</a></td>
                <td>
                    <?php
                    $labelClass = $stockUpdate->type == 'In' ? 'label-warning' : 'label-success';
                    ?>
                    <span class="label {{$labelClass}} pull-left" style="width: 35px">
                        {{strtoupper($stockUpdate->type)}}</span>
                    &nbsp;<a href="{{$link}}">{{$stockUpdate->event}}</a>

                    @if($stockUpdate->order_id)
                        Order #{{$stockUpdate->order_id}}
                    @endif

                    @if($stockUpdate->product->stockParent && $stockUpdate->product->stockParent->id == $element->id)
                        <span class="label pull-right bg-gray">V</span>
                    @endif
                </td>
                <td>{{$stockUpdate->quantity}}</td>
                <td>{{$stockUpdate->created_at->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
