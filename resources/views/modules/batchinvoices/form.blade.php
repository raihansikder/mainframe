<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'batchinvoices'
 * @var $mod                   \App\Module
 * @var $batchinvoice             \App\Batchinvoice Object that is being edited
 * @var $element               string 'batchinvoice'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */

if (isset($batchinvoice)) {
    $element_editable = false;
}

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
{{--@include('form.input-text',['var'=>['name'=>'name','label'=>'Name']])--}}

{{-- Model select --}}
{{--@include('form.select-model',['var'=>['name'=>'parent_id','label'=>'Parent task','table'=>'tasks', 'name_field'=>'name_ext']])--}}

{{-- Ajax based model select --}}
{{--@include('form.select-ajax',['var'=>['label' => 'Parent task', 'name' => 'parent_id', 'table' => 'tasks', 'name_field' => 'name_ext']])--}}

<?php
// $var = [
//     'name' => 'partnercategory_ids',
//     'label' => 'Partner categories',
//     'value' => (isset($partner)) ? json_decode($partner->partnercategory_ids) : [],
//     'query' => new \App\Partnercategory,
//     'params' => ['multiple', 'id' => 'partnercategory_ids'],
//     'container_class' => 'col-md-12',
//     'name_field' => 'name_ext',
// ];
?>
{{--@include('form.select-model', ['var'=>$var])--}}

<?php
// $var = [
// 'name' => 'charity_id',
// 'label' => 'Charity',
// 'query' => new \App\Charity,
// ];
?>
{{--@include('form.select-model', ['var'=>$var])--}}

{{-- Textarea--}}
{{--@include('form.textarea',['var'=>['name'=>'live_access','label'=>'Other Access Details']])--}}

{{-- Select array --}}
{{--@include('form.select-array',['var'=>['name'=>'priority','label'=>'Priority', 'options'=>kv(\App\Task::$priorities),'container_class'=>'col-sm-3']])--}}

{{--@include('form.plain-text',['var'=>['label'=>'Recommender', 'value'=>'test', 'container_class'=>'col-sm-6']])--}}

{{--beneficiary_type--}}
@include('form.select-array',['var'=>['name'=>'beneficiary_type','label'=>'Invoice to(Beneficiary type)<span class="text-red">*</span>', 'options'=>kv(\App\Invoice::$beneficiary_types)]])

{{--currency_type--}}
{{--@include('form.select-array',['var'=>['name'=>'currency_type','label'=>'Currency type(GBP/Non-GBP)<span class="text-red">*</span>', 'options'=>kv(\App\Invoice::$currency_types)]])--}}


{{--currency--}}
{{--@include('form.select-array',['var'=>['name'=>'currency','label'=>'Currency', 'options'=>kv(\App\Invoice::$currencies)]])--}}

<div class='clearfix'></div>

{{-- name --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Batch Name(Optional)']])

{{--invoice_type--}}
{{--@include('form.select-array',['var'=>['name'=>'invoice_type','label'=>'Invoice type', 'options'=>kv(\App\Invoice::$types)]])--}}

<div class='clearfix'></div>


{{--transfer_method--}}
@include('form.select-array',['var'=>['name'=>'transfer_method','label'=>'Transfer method', 'options'=>kv(\App\Invoice::$transfer_methods)]])

<div class='clearfix'></div>
<h4>Conversions</h4>

@isset($batchinvoice)
    @isset($batchinvoice->purchases_till)
        Invoices includes all conversions till : {{$batchinvoice->purchases_till->format('Y-m-d')}}
    @endif
@else
    {{--purchases_till--}}
    @include('form.input-text',['var'=>['name'=>'purchases_till', 'label'=>"Conversions till date", 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
@endif

{{--purchases_from--}}
{{--@include('form.input-text',['var'=>['name'=>'purchases_from', 'label'=>'Conversions from date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])--}}


<div class='clearfix'></div>
<h4><a target="_blank" href="https://docs.google.com/spreadsheets/d/1KmuTbTmRyEyTb6FExpERXVnV0NOczepOhpb10PVcMBo/edit?pli=1#gid=1815456268">Invoice dates</a>
</h4>
Invoices will be created with the given dates.
<div class='clearfix'></div>

{{--invoice_date--}}
@include('form.input-text',['var'=>['name'=>'invoice_date', 'label'=>'Invoice date<span class="text-red">*</span>', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])

<div class='clearfix'></div>
If left empty, following dates will be auto derived from invoice date above based on calculation in this
<a target="_blank" href="https://docs.google.com/spreadsheets/d/1KmuTbTmRyEyTb6FExpERXVnV0NOczepOhpb10PVcMBo/edit?pli=1#gid=1815456268">document</a>
<div class='clearfix'></div>
{{--due_date--}}
@include('form.input-text',['var'=>['name'=>'due_date', 'label'=>'Due date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])

{{--processing_date--}}
@include('form.input-text',['var'=>['name'=>'processing_date', 'label'=>'Processing date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])

{{--payment_date--}}
{{--@include('form.input-text',['var'=>['name'=>'payment_date', 'label'=>'Payment date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])--}}

{{--natwest_payment_to_arrive_credit_date--}}
{{--@include('form.input-text',['var'=>['name'=>'natwest_payment_to_arrive_credit_date', 'label'=>'Natwest payment to arrive credit date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])--}}

<div class='clearfix'></div>
<h4>Xero field</h4>
You can set custom Xero fields here. If left empty invoices will be created with default fields based this
<a target="_blank" href="https://docs.google.com/spreadsheets/d/1KmuTbTmRyEyTb6FExpERXVnV0NOczepOhpb10PVcMBo/edit?pli=1#gid=1815456268">document</a>
<div class='clearfix'></div>
{{--xero_account_code--}}
@include('form.input-text',['var'=>['name'=>'xero_account_code','label'=>'Xero Acc Code']])

{{--xero_invoice_type--}}
@include('form.input-text',['var'=>['name'=>'xero_invoice_type','label'=>'Xero Invoice Type']])

<div class='clearfix'></div>

{{--xero_account_number--}}
@include('form.input-text',['var'=>['name'=>'xero_account_number','label'=>'Xero Acc No']])

{{--xero_branding_theme_id--}}
@include('form.input-text',['var'=>['name'=>'xero_branding_theme_id','label'=>'Xero Branding Theme Id']])


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
            $("input[name=name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $batchinvoice(module
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
            // during update the variable $$element or $batchinvoice(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $batchinvoice->id
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
