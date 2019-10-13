<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name              string 'recommendurls'
 * @var $mod                      \App\Module
 * @var $recommendurl             \App\Recommendurl Object that is being edited
 * @var $element                  string 'recommendurl'
 * @var $element_editable         boolean
 * @var $uuid                     string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('content-top')
    @parent
    @if(isset($recommendurl))
        <div class="btn-group" style="padding-bottom: 15px">
            <a class="btn btn-default" href="{{route('admin.recommendurl-mock-visit',$recommendurl)}}">Mock visit</a>
        </div>
    @endif
@endsection



{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'product_url','label'=>'Product URL', 'container_class'=>'col-sm-6']])
@include('form.select-model',['var'=>['name'=>'partner_id','label'=>'Partner(Brand)', 'table'=>'partners']])
@include('form.input-text',['var'=>['name'=>'recommender_user_id','label'=>'User ID']])
<div class='clearfix'></div>
@include('form.input-text',['var'=>['name'=>'product_name','label'=>'Product name']])
@include('form.input-text',['var'=>['name'=>'product_sku','label'=>'SKU']])
@include('form.input-text',['var'=>['name'=>'product_price','label'=>'Price']])
@include('form.input-text',['var'=>['name'=>'product_price_currency','label'=>'Currency']])
<div class="clearfix"></div>

{{--@include('form.is_active')--}}


@if(user()->isSuperUser())
    @if(isset($recommendurl))
        <h5>Raw data</h5>
        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($recommendurl)); ?>
    @endif
@endif
{{-- Form ends --}}
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
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
            // during creation of an element. As this stage $$element or $recommendurl(module
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
            // during update the variable $$element or $recommendurl(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $recommendurl->id
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
        //enableValidation('{{$module_name}}'); // Instantiate validation function
    </script>
@endsection
{{-- JS ends --}}