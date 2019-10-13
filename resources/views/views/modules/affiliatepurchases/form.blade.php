<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'affiliatepurchases'
 * @var $mod                   \App\Module
 * @var $affiliatepurchase             \App\Affiliatepurchase Object that is being edited
 * @var $element               string 'affiliatepurchase'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>
{{-- ******************* Template Section list (From top to bottom ) ********************* --}}
@section('head')
    @parent
@endsection

@section('sidebar-left')
    @parent
@endsection

@section('title')
    @parent
@endsection

@section('breadcrumb')
    @parent
@endsection

@section('content-top')
    @parent
@endsection

<?php
/**
 * This is the main form that gets submitted to the controller.
 * Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 * app/views/spyr/modules/base/form.blade.php
 */
?>
{{-- ******************* Form starts ********************* --}}

{{-- Normal text field --}}

<div class="col-md-12 no-padding">
    @include('form.input-text',['var'=>['name'=>'name','label'=>'Name']])
    {{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
     app/views/spyr/modules/base/form.blade.php --}}
    {{--@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])--}}

    @include('form.select-model',['var'=>['name'=>'affiliate_program_id','label'=>'Affiliate', 'table'=>'affiliates', 'editable'=>true]])

    @include('form.select-model',['var'=>['name'=>'partner_id','label'=>'Partner(Brand)', 'table'=>'partners', 'editable'=>true]])

    {{--    @include('form.input-text',['var'=>['name'=>'unlisted_partner_name','label'=>'Other partner']])--}}

    @include('form.select-array',['var'=>['name'=>'partner_env','label'=>'Partner env', 'options'=>kv(\App\Partner::$statuses)]])

    <div class='clearfix'></div>
    <h4>Purchase details</h4>

    {{--    @include('form.select-array',['var'=>['name'=>'lb_env','label'=>'LB env', 'options'=>kv(\App\Partner::$statuses)]])--}}
    <?php
    $value = now();
    if (isset($affiliatepurchase)) {
        $value = $affiliatepurchase->purchased_at;
    }
    ?>


    @include('form.input-text',['var'=>['name'=>'purchased_at','label'=>'Purchased at(i.e. 2018-11-30 15:59:59)','value'=>$value]])

    <div class='clearfix'></div>


    {{--'product_order_id' => $product['purchase_id'],--}}
    @include('form.input-text',['var'=>['name'=>'product_order_id','label'=>'Partner Order Id']])

    {{--'product_id' => $product['product_id'],--}}
    @include('form.input-text',['var'=>['name'=>'product_id','label'=>'Product Id']])

    @if(isset($affiliatepurchase) && strlen($affiliatepurchase->product_image))
        <img src="{{$affiliatepurchase->product_image}}" style="width: 250px" alt="Product image"/>
    @endif

    {{--'product_name' => $product['name'],--}}
    @include('form.input-text',['var'=>['name'=>'product_name','label'=>'Product name']])

    {{--'product_sku' => $product['sku'],--}}
    @include('form.input-text',['var'=>['name'=>'product_sku','label'=>'Product SKU']])

    {{--'product_title' => $product['title'],--}}
    @include('form.input-text',['var'=>['name'=>'product_title','label'=>'Product Title']])

    @include('form.input-text',['var'=>['name'=>'product_url','label'=>'Product URL']])

    {{--'product_quantity' => $product['quantity'],--}}
    @include('form.input-text',['var'=>['name'=>'product_quantity','label'=>'Product Quantity']])

    {{--'product_vendor' => $product['vendor'],--}}
    @include('form.input-text',['var'=>['name'=>'product_vendor','label'=>'Product Vendor']])

    {{--'product_image' => $product['product_image'],--}}
    @include('form.input-text',['var'=>['name'=>'product_image','label'=>'Product Image URL']])

    <div class='clearfix'></div>
    <h4>Price/Amount</h4>

    @include('form.input-text',['var'=>['name'=>'product_currency','label'=>'Product Currency(USD/GBP/EUR)']])

    @include('form.input-text',['var'=>['name'=>'product_line_price','label'=>'Product Total Price']])

    {{--@isset($affiliatepurchase)--}}
    {{--{{myprint_r(\App\Conversionrate::convertAmountToOtherCurrencies($affiliatepurchase->product_line_price, $affiliatepurchase->product_currency,$affiliatepurchase->purchased_at))}}--}}
    {{--@endif--}}

    @include('form.select-array',['var'=>['name'=>'price_adjust','label'=>'Adjust price that comes from site', 'options'=>['1'=>'Yes','0'=>'No']]])
    <div class="clearfix"></div>
    @include('form.input-text',['var'=>['name'=>'lb_directsales_commission_currency','label'=>'LB direct sale commission Currency(USD/GBP/EUR)']])

    @include('form.input-text',['var'=>['name'=>'lb_directsales_commission_amount','label'=>'LB direct sale commission amount']])
    {{-- @include('module.modules.purchases.purchase-details')--}}
    <div class='clearfix'></div>
    @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>kv(\App\Purchase::$statuses)]])

    {{--    @include('form.select-array',['var'=>['name'=>'is_approved','label'=>'Approved?', 'options'=>['0'=>'No','1'=>'Yes']]])--}}

    @include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])

    <div class='clearfix'></div>
    @include('form.textarea',['var'=>['name'=>'note','label'=>'Note for return/cancel', ]])

</div>

{{--@include('form.is_active')--}}
{{-- ******************* Form ends *********************** --}}

@section('content-bottom')
    @parent
@endsection

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
            // during creation of an element. As this stage $$element or $affiliatepurchase(module
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
            // during update the variable $$element or $affiliatepurchase(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $affiliatepurchase->id
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
        enableValidation('{{$module_name}}'); // Instantiate validation function
    </script>
@endsection
