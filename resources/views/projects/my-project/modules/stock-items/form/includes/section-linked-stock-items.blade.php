<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 3/18/2020
 * Time: 8:43 PM
 */
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Products\Product $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

$stockItems = $element->linkedStockItems;
$createBtnLink = route('stock-items.create')
    .'?in_stock_update_id='.$element->stockUpdate->id
    .'&parent_id='.$element->id;
// .'?redirect_success='.URL::full();
?>


<div class="col-md-6 border-dotted " style="padding-top:15px; margin-top:15px;">
    <div class="clearfix"></div>

    <h4 class="pull-left">Linked Stock Items</h4>

    <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Create a new entry">
        <i class="fa fa-plus"></i>
    </a>
    <div class="clearfix"></div>
    The item might contain additional sub-components that can be entered below.
    <table id="tableStockItems" class="table datatable-min">
        <thead>
        <tr id="header">
            <th>No.</th>
            <th>Serial</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stockItems as $stockItem)
            <?php
            /** @var \App\Projects\MphMarket\Modules\stockItems\StockItem $stockItem */
            $link = route('stock-items.edit', $stockItem->id);
            // ."?redirect_success=".URL::full();
            ?>
            <tr>
                <td><a href="{{$link}}">{{pad($stockItem->id,3)}}</a></td>
                <td><a href="{{$link}}">{{$stockItem->code}}</a></td>
                <td>{{$stockItem->quantity}}</td>
                <td>{{$stockItem->created_at->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>