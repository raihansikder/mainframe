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

$promotionalPrices = $element->promotionalPrices;
$createBtnLink = route('promotional-prices.create')
    .'?product_id='.$element->id;
// ."&redirect_success=".URL::full()
?>


<div class="col-md-12 border-dotted " style="padding-top:15px;">
    <div class="clearfix"></div>

    <h4 class="pull-left">Promotional Prices</h4>
    <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Create a new entry" target="_blank">
        <i class="fa fa-plus"></i>
    </a>
    <table id="tablePromotionalPrices" class="table datatable-min">
        {{-- datatable-min--}}
        <thead>
        <tr id="header">
            <th>Id.</th>
            <th>Start</th>
            <th>End</th>
            <th>Price</th>
            <th>Active</th>
            <th>Expired</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotionalPrices as $promotionalPrice)
            <?php
            /** @var \App\Projects\MphMarket\Modules\PromotionalPrices\PromotionalPrice $promotionalPrice */
            $link = route('promotional-prices.edit', $promotionalPrice->id);
            // ."?redirect_success=".URL::full();
            ?>
            <tr>
                <td>
                    <a href="{{$link}}">
                        {{pad($promotionalPrice->id,3)}}
                    </a>
                </td>
                <td>{{formatDate($promotionalPrice->starts_at)}}</td>
                <td>{{formatDate($promotionalPrice->ends_at)}}</td>
                <td>&pound;{{$promotionalPrice->price_gbp}}</td>
                <td>@if($promotionalPrice->is_active){{"Yes"}}@else {{"No"}}@endif</td>
                <td>@if($promotionalPrice->has_expired){{"Yes"}}@else {{"No"}}@endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>