<form id="formAddOrderItem" method="post" action="{{route('order-items.store')}}">
    @csrf
    <label>Add a product from the list <a target="_blank" href="{{route('products.index')}}"> - See
            List</a></label>
    <div class="clearfix"></div>

    @include('form.custom.product-select')
    <div class="col-md-2">
        <input name="quantity" class="form-control validate[required,number]" placeholder="Quantity" value="1"/>
    </div>
    <input type="hidden" name="order_id" value="{{$element->id}}"/>
    <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
    <input type="hidden" name="redirect_full" value="{{URL::full()}}"/>
    <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Add To Order</button>
</form>