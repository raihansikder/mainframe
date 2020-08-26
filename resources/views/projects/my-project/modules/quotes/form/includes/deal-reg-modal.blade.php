<?php
/**
 * @var \App\Projects\MphMarket\Modules\Quotes\Quote $element
 * @var \App\User $user
 */
use App\Projects\MphMarket\Modules\Products\Product;
use App\Projects\MphMarket\Modules\Vendors\Vendor;
?>
<div class="modal fade" id="dealRegModal" tabindex="-1" role="dialog" aria-labelledby="dealRegModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="dealRegForm" method="POST" action="{{route('quotes.create-deal-regs',$element->id)}}" accept-charset="UTF-8">
                <input name="_method" type="hidden" value="POST">
                <input name="_token" type="hidden" value="{{csrf_token()}}">
                <input name="quote_id" type="hidden" value="{{$element->id}}">
                <input name="redirect_success" type="hidden" value="{{route('deal-regs.index')}}"/>
                <input name="redirect_fail" type="hidden" value="{{URL::full()}}"/>
                {{--<input name="ret" type="hidden" value="json"/>--}}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="dealRegModalLabel">Confirm Deal Reg</h4>
                </div>

                <div class="modal-body">
                    Are you sure? <br/>
                    This will be sent to MPH team for review. <br/>

                    Following are the list of products from this quote that qualify for Deal Reg.

                    <table class="table table-bordered" style="margin-top: 15px; ">
                        <?php
                        $vendors = $element->possibleDealRegs();
                        $i = 1;
                        ?>
                        @foreach($vendors as $vendorId=>$productIds)
                            <tr>
                                <td>
                                    <b>{{$i++}}. {{Vendor::select(['name'])->find($vendorId)->name}}</b>
                                </td>
                                <td>
                                    @foreach($productIds as $productId)
                                        <?php
                                        $product = Product::select(['sku', 'name'])->find($productId);
                                        ?>
                                        {{$product->sku .' - '.$product->name}}<br/>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id='dealRegSubmit' name='dealReg' class="btn btn-default bg-blue-active pull-right flat">
                            Proceed <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>