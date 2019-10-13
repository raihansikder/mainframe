<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name                  string 'pushnotifications'
 * @var $mod                          \App\Module
 * @var $pushnotification             \App\Pushnotification Object that is being edited
 * @var $element                      string 'pushnotification'
 * @var $element_editable             boolean
 * @var $uuid                         string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Title', 'container_class'=>'col-sm-6']])
<div class="clearfix"></div>
@include('form.textarea',['var'=>['name'=>'message','label'=>'Message', 'container_class'=>'col-sm-6']])
<div class="clearfix"></div>
{{-- Region --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#region">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Region
                </a>
            </h5>
        </div>
        <div id="region" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12" style="padding-bottom: 10px;">You can include a list of countries for which
                you have to send Push Notifications.
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">

                <?php
                $var = [
                    'name' => 'country_ids',
                    'label' => 'Countries',
                    'value' => (isset($pushnotifications)) ? explode(',', trim($pushnotifications->country_ids, ", ")) : [],
                    'query' => new \App\Country,
                    'params' => ['multiple', 'id' => 'country_ids'],
                    'container_class' => 'col-md-12',
                ];
                ?>
                @include('form.select-model', ['var'=>$var])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@include('form.is_active')

@if(isset($pushnotification))
    @if(user()->isSuperUser())
        <h5>Raw data (for debugging)</h5>
        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($pushnotification)); ?>
    @endif
@endif

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
            $("input[name=name],textarea[name=message]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $pushnotification(module
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
            // during update the variable $$element or $pushnotification(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $pushnotification->id
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