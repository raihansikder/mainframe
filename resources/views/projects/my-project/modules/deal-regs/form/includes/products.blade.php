<?php
/** @var \App\Projects\MphMarket\Modules\DealRegs\DealReg $element */
$manageItems = false;
?>

<h4>Products included in this Deal Reg</h4>
@if($element->isUpdating() && $editable && $manageItems)
    <form id="formAddDealRegItem" method="post" action="{{route('deal-reg-items.store')}}">
        @csrf
        <?php
        $var = [
            'name' => 'product_id',
            'table' => 'products',
            'name_field' => 'name_ext',
            'url' => route('products.list-json')
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

@if($element->isUpdating() && $editable)
    <div class="clearfix"></div>
    <ul class="list-group col-md-6" style="margin-top: 10px">
        @foreach($element->dealRegItems as $item)
            <li class="list-group-item">
                <a href="{{route('products.show',$item->product_id)}}">{{ $item->product->name_ext }}</a>
                @if($manageItems)
                    <?php
                    /** @var \App\Projects\MphMarket\Modules\DealRegItems\DealRegItem $item */
                    $var = [
                        'route' => route('deal-reg-items.destroy', $item->id),
                        'redirect_success' => URL::full(),
                        'value' => "<i class='fa fa-remove'></i>",
                        'params' => [
                            'class' => 'btn btn-danger btn-xs flat pull-right'
                        ]
                    ];
                    ?>
                    @include('form.delete-button',['var'=>$var])
                @endif
            </li>
        @endforeach
    </ul>
@endif