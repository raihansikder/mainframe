<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables
 * @var $moduleName           string 'reports'
 * @var $currentModule                   \App\Mainframe\Modules\Modules\Module
 * @var $report                \App\Report Object that is being edited
 * @var $element               string 'report'
 * @var $editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>
@if(isset($report->id))
    <a href="{{App\Report::getReportUrlFromId($report->id)}}" class="btn btn-sm btn-flat btn-success" type='button'
       target="_blank"> Run Report </a>
@endif
<div class="clearfix margin" ></div>

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'title','label'=>'Title', 'div'=>'col-sm-9']])
@include('form.input-text',['var'=>['name'=>'type','label'=>'Type', 'div'=>'col-sm-3']])

{{--@include('form.select-array',['var'=>['name'=>'type','label'=>'Type', 'options'=>array_merge([''=>'Select'],kv(App\Report::$types)),'div'=>'col-sm-3']])--}}
@include('form.input-text',['var'=>['name'=>'version','label'=>'Version', 'div'=>'col-sm-3']])
@include('form.select-model',['var'=>['name'=>'module_id','label'=>'Module','table'=>'modules', 'div'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'tags','label'=>'Tags', 'div'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'is_module_default','label'=>'Is Module Default', 'options'=>['0'=>'No','1'=>'Yes'],'div'=>'col-sm-3']])
@include('form.textarea',['var'=>['name'=>'description','label'=>'Description', 'div'=>'col-sm-12']])
@include('form.textarea',['var'=>['name'=>'parameters','label'=>'Parameters', 'div'=>'col-sm-12']])
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
            $("input[name=title]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $report(module
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
            // during update the variable $$element or $report(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $report->id
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
        enableValidation('{{$moduleName}}'); // Instantiate validation function
    </script>
@endsection
{{-- JS ends --}}