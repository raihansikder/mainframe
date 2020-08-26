<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Products\Product $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
$bundledItems = $element->childBundleItems;
$createBtnLink = route('bundled-products.create')
    .'?parent_id='.$element->id
    .'&is_active=1'
;
// ."&redirect_success=".URL::full()
?>

<div class="col-md-12 border-dotted " style="padding-top:15px; margin: 15px 0;">
    <div class="clearfix"></div>

    <h4 class="pull-left">Bundle Items</h4>
    <a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Add a product in bundle">
        <i class="fa fa-plus"></i>
    </a>
    <table id="tableVariants" class="table datatable-min">
        <thead>
        <tr id="header">
            <th>Id.</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Stock</th>
            <th>Active</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($bundledItems as $item)
            <?php
            /** @var \App\Projects\MphMarket\Modules\BundledProducts\BundledProduct $item */
            $link = route('bundled-products.edit', $item->id);
            // ."?redirect_success=".URL::full();
            if ($editable) {
                $deleteBtnVar = [
                    'route'            => route('bundled-products.destroy', $item->id),
                    'redirect_success' => URL::full(),
                    'value'            => "<i class='fa fa-remove'></i>",
                    'params'           => [
                        'class' => 'btn btn-danger btn-xs flat'
                    ]
                ];
            }
            ?>
            <tr>
                <td><a href="{{$link}}">{{pad($item->id,3)}}</a></td>
                <td><a href="{{route('products.edit',$item->product->id)}}">{{$item->product->sku}} - {{$item->product->name}}</a></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product->current_stock}}</td>
                <td>@if($item->is_active){{"Yes"}}@else {{"No"}}@endif</td>
                <td style="text-align: right">
                    @if($editable)
                        @include('form.delete-button',['var'=>$deleteBtnVar])
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>