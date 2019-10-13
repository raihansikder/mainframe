<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'purchases'
 * @var $mod                   \App\Module
 * @var $purchase              \App\Purchase Object that is being edited
 * @var $element               string 'purchase'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>
@section('content-top')
    @parent
    @if(isset($purchase))
        @if(user()->isSuperUser())
            <div class="btn-group" style="padding-bottom: 15px">
                <a class="btn btn-default" href="{{route('purchase.send-notification',$purchase)}}">Notify</a>
            </div>
        @endif
    @endif
@endsection

{{--<code>{{App\Charity::nextCycle()}}</code>--}}
{{--<code>{{App\Charity::qualifyingPurchaseDate()}}</code>--}}


<div class="col-md-9 no-padding">
    {{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
     app/views/spyr/modules/base/form.blade.php --}}
    {{--@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])--}}



    @if(isset($purchase))
        @include('form.select-model',['var'=>['name'=>'partner_id','label'=>'Partner(Brand)', 'table'=>'partners',
        'editable'=>false]])
        @include('form.select-array',['var'=>['name'=>'partner_env','label'=>'Env', 'options'=>kv(\App\Partner::$statuses)]])

        @include('form.select-array',['var'=>['name'=>'is_approved','label'=>'Approved?', 'options'=>['0'=>'No','1'=>'Yes']]])

        @include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
        <div class='clearfix'></div>
    @endif

    {{--'recommendurl_short_code' => $product['recommendurl_short_code'],--}}
    @include('form.input-text',['var'=>['name'=>'recommendurl_short_code','label'=>'Share URL short-code']])
    <div class='clearfix'></div>

    {{--'beacon_id' => $this->id,--}}
    @include('form.input-text',['var'=>['name'=>'beacon_id','label'=>'Beacon Id']])

    {{--'beacon_id' => $this->id,--}}
    @include('form.input-text',['var'=>['name'=>'buyer_id','label'=>'Buyer user Id']])

    {{--'user_share_code' => $product['user_share_code'],--}}
    @include('form.input-text',['var'=>['name'=>'user_share_code','label'=>'User share code']])

    <?php
    $value = now();
    if (isset($purchase)) {
        $value = $purchase->purchased_at;
        if ($purchase->beacon()->exists()) {
            $value = $purchase->beacon->created_at;
        }
    }
    ?>

    @include('form.input-text',['var'=>['name'=>'purchased_at','label'=>'Purchased at(i.e. 2018-11-30 15:59:59)','value'=>$value]])

    <div class='clearfix'></div>


    {{--'product_order_id' => $product['purchase_id'],--}}
    @include('form.input-text',['var'=>['name'=>'product_order_id','label'=>'Partner Order Id']])

    {{--'product_id' => $product['product_id'],--}}
    @include('form.input-text',['var'=>['name'=>'product_id','label'=>'Product Id']])

    {{--'order_ts' => $product['ts'],--}}
    @include('form.input-text',['var'=>['name'=>'order_ts','label'=>'Order Ts']])

    {{--'tab_id' => $product['tab_id'],--}}
    @include('form.input-text',['var'=>['name'=>'tab_id','label'=>'Order Tab Id']])

    <div class='clearfix'></div>
    @if(isset($purchase) && strlen($purchase->product_image))
        <img src="{{$purchase->product_image}}" style="width: 250px" alt="Product image"/>
    @endif

    {{--'product_name' => $product['name'],--}}
    @include('form.input-text',['var'=>['name'=>'product_name','label'=>'Product name']])

    {{--'product_sku' => $product['sku'],--}}
    @include('form.input-text',['var'=>['name'=>'product_sku','label'=>'Product SKU']])

    {{--'product_title' => $product['title'],--}}
    @include('form.input-text',['var'=>['name'=>'product_title','label'=>'Product Title']])

    {{--'product_url' => $product['product_url'],--}}
    @include('form.input-text',['var'=>['name'=>'product_url','label'=>'Product URL']])

    {{--'product_currency' => $product['currency'],--}}
    @include('form.input-text',['var'=>['name'=>'product_currency','label'=>'Product Currency(USD/GBP/EUR)']])

    {{--price_adjust--}}
    @include('form.select-array',['var'=>['name'=>'price_adjust','label'=>'Adjust price that comes from site', 'options'=>['1'=>'Yes','0'=>'No']]])

    {{--'product_price_in_product_currency' => $product['total_price'],--}}
    @include('form.input-text',['var'=>['name'=>'product_price_in_product_currency','label'=>'Total price of all products ']])

    {{--'product_line_price' => $product['line_price'],--}}
    @include('form.input-text',['var'=>['name'=>'product_line_price','label'=>'Product Line Price']])
    <div class="clearfix"></div>
    {{--'product_quantity' => $product['quantity'],--}}
    @include('form.input-text',['var'=>['name'=>'product_quantity','label'=>'Product Quantity']])

    <div class="clearfix"></div>

    {{--'product_vendor' => $product['vendor'],--}}
    @include('form.input-text',['var'=>['name'=>'product_vendor','label'=>'Product Vendor']])

    {{--'checkout_url' => $product['checkout_url'],--}}
    @include('form.input-text',['var'=>['name'=>'checkout_url','label'=>'Checkout URL']])

    {{--'product_image' => $product['product_image'],--}}
    @include('form.input-text',['var'=>['name'=>'product_image','label'=>'Product Image URL']])

    {{--'product_lb_url' => $product['product_lb_url'],--}}
    @include('form.input-text',['var'=>['name'=>'product_lb_url','label'=>'LB share URL']])

    {{--'product_price_cent' => $product['price_cent'],--}}
    {{-- @include('form.input-text',['var'=>['name'=>'product_url','label'=>'Product URL']])--}}
    {{--@include('form.plain-text',['var'=>['label'=>'Recommender', 'value'=>'test', 'container_class'=>'col-sm-6']])--}}

    @if(isset($purchase))
        @if($purchase->user()->exists())




            {{-- @include('module.modules.purchases.purchase-details')--}}

            <div class='clearfix'></div>
            @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>kv(\App\Purchase::$statuses)]])
            @if(user()->isLBAccounts() || user()->isSuperUser())
                @include('form.input-text',['var'=>['name'=>'charity_share_percentage','label'=>'Donation %']])
            @endif
            <div class='clearfix'></div>
            @include('form.textarea',['var'=>['name'=>'note','label'=>'Note for return/cancel', ]])
            <div class='clearfix'></div>

            @if(user()->isLBAccounts() || user()->isSuperUser())
                <hr/>
                <h4>Split data</h4>
                @include('form.input-text',['var'=>['name'=>'split_share_percentage','label'=>'User A Split Share %']])
                @include('form.input-text',['var'=>['name'=>'split_user_id','label'=>'Split User(B) Id']])
                {{--                @include('form.input-text',['var'=>['name'=>'split_user_name','label'=>'Split User(B) Name']])--}}
                @include('form.input-text',['var'=>['name'=>'split_charity_share_percentage','label'=>'User B Split Charity Share % ']])
                @include('form.input-text',['var'=>['name'=>'split_charity_id','label'=>'Split Charity Id']])
                @include('form.input-text',['var'=>['name'=>'split_charity_currency','label'=>'Split Charity Currency']])
            @endif
            <div class='clearfix'></div>

            <hr/>
            @include('modules.purchases.amount-table', ['purchase' => $purchase])
            <hr/>
            <div class='clearfix'></div>
            @if(user()->isSuperUser())
                <h5>Raw data (for debugging)</h5>
                <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($purchase)); ?>
            @endif
        @else
            Invalid recommender!
        @endif
    @endif
</div>


{{--@include('form.is_active')--}}
{{-- Form ends --}}

{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            //$("input[name=name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $purchase(module
            // name singular) is not set, also there is no id is created
            // Following the convention of spyrframe you are only allowed to call functions
            /*******************************************************************/

            // your functions go here
            // function1();
            // function2();

        </script>
    @else
        <script type="text/javascript">
            /*******************************************************************/
            // Updating :
            // this is a place holder to write  the javascript codes that will run
            // while updating an element that has been already created.
            // during update the variable $$element or $purchase(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $purchase->id
            // Following the convention of spyrframe you are only allowed to call functions
            /*******************************************************************/

            // your functions go here
            // function1();
            // function2();
        </script>
    @endif
    <script type="text/javascript">
        /*******************************************************************/
        // Saving :
        // Saving covers both creating and updating (Similar to Eloquent model event)
        // However, it is not guaranteed $$element is set. So the code here should
        // be functional for both case where an element is being created or already
        // created. This is a good place for writing validation
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions goe here
        // function1();
        // function2();

        /*******************************************************************/
        // frontend and Ajax hybrid validation
        /*******************************************************************/
        addValidationRulesForSaving(); // Assign validation classes/rules
        {{--enableValidation('{{$module_name}}'); // Instantiate validation function--}}
    </script>
@endsection
{{-- JS ends --}}