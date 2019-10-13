<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'countries'
 * @var $mod                   \App\Module
 * @var $country               \App\Country Object that is being edited
 * @var $element               string 'country'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'code','label'=>'Order', 'container_class'=>'col-sm-2']])
{{--country_short_name--}}
{{--@include('form.input-text',['var'=>['name'=>'country_short_name','label'=>'Short name', 'container_class'=>'col-sm-6']])--}}
{{--country_long_name--}}
{{--@include('form.input-text',['var'=>['name'=>'country_long_name','label'=>'Long name', 'container_class'=>'col-sm-6']])--}}
{{--country_id--}}
{{--@include('form.input-text',['var'=>['name'=>'country_id','label'=>'Country id', 'container_class'=>'col-sm-6']])--}}
{{--iso2--}}
{{--@include('form.input-text',['var'=>['name'=>'iso2','label'=>'ISO "ALPHA-2" code', 'container_class'=>'col-sm-6']])--}}
{{--iso3--}}
{{--@include('form.input-text',['var'=>['name'=>'iso3','label'=>'ISO "ALPHA-3" code', 'container_class'=>'col-sm-6']])--}}
{{--numcode--}}
{{--@include('form.input-text',['var'=>['name'=>'numcode','label'=>'Numeric code', 'container_class'=>'col-sm-6']])--}}
{{--calling_code--}}
{{--@include('form.input-text',['var'=>['name'=>'calling_code','label'=>'Calling code', 'container_class'=>'col-sm-6']])--}}
{{--cctld--}}
{{--@include('form.input-text',['var'=>['name'=>'cctld','label'=>'Country code top level domain', 'container_class'=>'col-sm-6']])--}}
{{--un_member--}}

<div class="clearfix"></div>
<h5>Original currency</h5>
@include('form.input-text',['var'=>['name'=>'currency','label'=>'Qurrency', 'container_class'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'currency_symbol','label'=>'Oiginal symbol', 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>

<h5>LB currency override</h5>
Over-ride the original currency with a currency used for LB -
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'currency_override','label'=>'Currency usd(LB)', 'container_class'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'currency_override_symbol','label'=>'Currency symbol(LB)', 'container_class'=>'col-sm-3']])
{{--@include('form.input-text',['var'=>['name'=>'currency_override_symbol','label'=>'Is Un member', 'container_class'=>'col-sm-6']])--}}
{{--is_active--}}
@include('form.is_active')
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
            $("input[name=country_short_name]").addClass('validate[required]');
            $("input[name=country_long_name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $country(module
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
            // during update the variable $$element or $country(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $country->id
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
{{-- JS ends --}}