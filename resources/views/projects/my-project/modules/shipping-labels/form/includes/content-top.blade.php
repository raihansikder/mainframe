@if($element->order_id)
    <a class="btn btn-default pull-left" href="{{route('orders.edit',$element->order_id)}}">
        <i class="fa fa-angle-left"></i> Order
    </a>
@endif

@if($element->isUpdating())
{{--    <a class="btn btn-default bg-blue" href="{{route('shipping-labels.submit-shipment',$element->id)}}">--}}
{{--        <i class="fa fa-tags"></i> Create Shipping Label--}}
{{--    </a>--}}
    @if(!$element->tracking_number)
        <a class="btn btn-default bg-blue" href="{{route('shipping-labels.submit-shipment',$element->id)}}">
            <i class="fa fa-tags"></i> Create Shipping Label
        </a>
    @else
        {{-- <a class="pull-left btn btn-default" target="_blank" href="{{route('shipping-labels.view.labels',$element->id)}}">View Labels</a>--}}
    @endif
@endif