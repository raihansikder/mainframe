<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'beacons'
 * @var $mod                   \App\Module
 * @var $beacon                \App\Beacon Object that is being edited
 * @var $element               string 'beacon'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
{{--@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])--}}

@if(user()->isSuperUser() || user()->isFirstLineSupport())
    @include('form.textarea',['var'=>['name'=>'data','label'=>'Data(JSON)', 'container_class'=>'col-sm-6']])
@endif
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
{{--@include('form.is_active')--}}
{{-- Form ends --}}

<div class="clearfix"></div>
@if(isset($beacon))
    <h4>Beacon analyzer </h4>
    <div class="col-md-6 no-padding-l">
        <h5>Original Beacon (JSON)</h5>
        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($beacon->data)); ?>

        <h5>'purchases' table entries (Array)</h5>
        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($beacon->purchases)); ?>
    </div>
    <div class="col-md-6 no-padding-l">
        <h5>
            @if($beacon->hasValidPurchaseData(true) == false)
                <span class="text-red pull-right">This beacon is invalid</span>
            @endif
        </h5>

        <h5>Products in Recommendation event</h5>
        <?php
        Symfony\Component\VarDumper\VarDumper::dump($beacon->productsInRecommendations());
        // myprint_r($beacon->productsInRecommendations());
        ?>

        <h5>Products in Purchase event</h5>
        <?php
        Symfony\Component\VarDumper\VarDumper::dump($beacon->productsInPurchases());
        // myprint_r($beacon->productsInPurchases());
        ?>

        <h5>Products common in both - recommendation(s) and purchases(s) (Array)</h5>
        <?php
        Symfony\Component\VarDumper\VarDumper::dump($beacon->productsInBothPurchaseAndRecommendation()) ?>

        <h5>Request headers </h5>
        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($beacon->headers)) ?>
    </div>
@endif

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
            // during creation of an element. As this stage $$element or $beacon(module
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
            // during update the variable $$element or $beacon(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $beacon->id
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