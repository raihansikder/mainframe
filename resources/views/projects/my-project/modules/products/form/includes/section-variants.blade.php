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

$variants = $element->variants;
$createBtnLink = route('products.create')
    .'?parent_id='.$element->id
    .'&stock_parent_id='.$element->id;
// ."&redirect_success=".URL::full()
?>

<div class="col-md-12 border-dotted " style="padding-top:15px; margin: 15px 0;">
    <div class="clearfix"></div>

    <h4 class="pull-left">Variants</h4>
    <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Create a new variant">
        <i class="fa fa-plus"></i>
    </a>
    <table id="tableVariants" class="table datatable-min">
        {{-- datatable-min--}}
        <thead>
        <tr id="header">
            <th>Id.</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Active</th>
        </tr>
        </thead>
        <tbody>
        @foreach($variants as $variant)
            <?php
            /** @var \App\Projects\MphMarket\Modules\Products\Product $variant */
            $link = route('products.edit', $variant->id);
            // ."?redirect_success=".URL::full();
            ?>
            <tr>
                <td><a href="{{$link}}">{{pad($variant->id,3)}}</a></td>
                <td><a href="{{$link}}">{{$variant->name}}</a></td>
                <td>{{$variant->sku}}</td>
                <td>@if($variant->is_active){{"Yes"}}@else {{"No"}}@endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>