<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name             string 'partnersites'
 * @var $mod                     \App\Module
 * @var $partnersite             \App\Partnersite Object that is being edited
 * @var $element                 string 'partnersite'
 * @var $element_editable        boolean
 * @var $uuid                    string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
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
@include('form.select-model',['var'=>['name'=>'partner_id','label'=>'Partner(Brand)', 'table'=>'partners', 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'name','label'=>'Site name', 'container_class'=>'col-sm-6']])
@include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'sitecms_name','label'=>'CMS/Platform','container_class'=>'col-sm-3']])
<div class="clearfix"></div>
<div class="col-md-6 no-padding-l">
    <h5>Live</h5>
    @include('form.input-text',['var'=>['name'=>'live_url_root','label'=>'Root/Home Url']])
    @include('form.input-text',['var'=>['name'=>'live_url_product','label'=>'Sample Product Details URL']])
    @include('form.input-text',['var'=>['name'=>'live_url_order_confirmation','label'=>'Order Confirmation URL']])
    @include('form.textarea',['var'=>['name'=>'live_access','label'=>'Other Access Details']])
</div>
<div class="col-md-6 no-padding-l">
    <h5>Stage</h5>
    @include('form.input-text',['var'=>['name'=>'stage_url_root','label'=>'Root/Home Url']])
    @include('form.input-text',['var'=>['name'=>'stage_url_product','label'=>'Sample Product Details URL']])
    @include('form.input-text',['var'=>['name'=>'stage_url_order_confirmation','label'=>'Order Confirmation URL']])
    @include('form.textarea',['var'=>['name'=>'stage_access','label'=>'Other Access Details']])
</div>


<h5>Other Technical Details</h5>
<div class="col-md-6 no-padding-l">
    @include('form.textarea',['var'=>['name'=>'site_file_structure','label'=>'File Structure (Custom Site)']])
</div>
<div class="col-md-6 no-padding-l">
    @include('form.textarea',['var'=>['name'=>'integration_note','label'=>'Integration Note']])
</div>

<div class="clearfix"></div>

@include('form.is_active')
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
            // during creation of an element. As this stage $$element or $partnersite(module
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
            // during update the variable $$element or $partnersite(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $partnersite->id
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
        // enableValidation('{{$module_name}}'); // Instantiate validation function
    </script>
@endsection
