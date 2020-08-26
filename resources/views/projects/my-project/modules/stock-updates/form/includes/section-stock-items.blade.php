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
 * @var \App\Projects\MphMarket\Modules\StockUpdates\StockUpdate $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

$stockItems = $element->stockItems()->whereNull('parent_id')->get();
$createBtnLink = route('stock-items.create')
    ."?redirect_success=".URL::full()
    ."&in_stock_update_id=".$element->id;
?>


<div class="col-md-6 border-dotted " style="padding-top:15px;">
    <div class="clearfix"></div>

    <h4 class="pull-left">Individual items</h4>

    @if($element->isInStock())
        <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Create a new entry">
            <i class="fa fa-plus"></i>
        </a>
    @endif
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
            // .'?redirect_success='.URL::full();
            ?>
            <tr>
                <td><a href="{{$link}}">{{pad($stockItem->id,3)}}</a></td>
                <td>
                    <a href="{{$link}}"><b>{{$stockItem->code}}</b></a>

                    @foreach($stockItem->linkedStockItems as $linkedItem)
                        <br/><i class="fa fa-ellipsis-v"></i>
                        &nbsp;<a href="{{route('stock-items.edit',$linkedItem->id)}}"> {{$linkedItem->code}}</a>
                        &nbsp;{{$linkedItem->name}}
                    @endforeach
                </td>
                <td>{{$stockItem->quantity}}-{{$stockItem->status}}</td>
                <td>{{$stockItem->created_at->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>