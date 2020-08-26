@extends('form.modal')
<?php
/**
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
 * @var \App\User $user
 */
use App\Projects\MphMarket\Modules\Products\Product;
use App\Projects\MphMarket\Modules\Vendors\Vendor;

/*
 * Prepare the contents for dealreg table
 */
$vendors = $element->possibleDealRegs();

$rows = []; $i = 0;

foreach ($vendors as $vendorId => $productIds) {

    $rows[$i]['vendor'] = Vendor::find($vendorId)->name;

    foreach ($productIds as $productId) {
        $product = Product::select(['sku', 'name'])->find($productId);
        $rows[$i]['products'][] = $product->sku.' - '.$product->name;
    }

    $i++;
}



?>

@section('header')
    Confirm Deal Reg
@stop


@section('body')
    <form name="dealRegForm" id="dealRegForm" method="POST" action="{{route('quotes.create-deal-regs',$element->id)}}" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="POST">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <input name="quote_id" type="hidden" value="{{$element->id}}">
        <input name="redirect_success" type="hidden" value="{{route('deal-regs.index')}}"/>
        <input name="redirect_fail" type="hidden" value="{{URL::full()}}"/>

        Are you sure? <br/>
        This will be sent to MPH team for review. <br/>

        Following are the list of products from this quote that qualify for Deal Reg.

        <table class="table table-bordered" style="margin-top: 15px; ">
            @foreach($rows as $row)
                <tr>
                    <td><b>{{$row['vendor']}}</b></td>
                    <td>
                        @foreach($row['products'] as $product)
                            {{$product}}<br/>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>

    </form>
@stop

@section('footer')
    @parent
    <button type="submit" id='dealRegSubmit' name='dealReg'
            class="btn btn-default bg-blue-active pull-right flat">
        Proceed <i class="fa fa-angle-right"></i>
    </button>
@stop



@section('js')
    @parent
    <script>
        $('button#dealRegSubmit').click(function () {
            $('form#dealRegForm').submit();
        });
    </script>
@stop
