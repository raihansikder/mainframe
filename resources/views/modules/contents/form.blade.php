<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'contents'
 * @var $mod                   \App\Module
 * @var $content               \App\Content Object that is being edited
 * @var $element               string 'content'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.select-model',['var'=>['name'=>'module_id','label'=>'Module', 'table'=>'modules', 'name_field'=>'title', 'container_class'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'element_id','label'=>'ID #', 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>
@include('form.select-array',['var'=>['name'=>'type','label'=>'Content type', 'options'=>kv(array_merge([""=>'-'],\App\Content::$types)), 'container_class'=>'col-sm-3']])
@include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'container_class'=>'col-sm-3']])
{{--@include('form.select-model',['var'=>['name'=>'page_id','label'=>'Page','table'=>'pages', 'container_class'=>'col-sm-3']])--}}
@include('form.input-text',['var'=>['name'=>'order','label'=>'Order', 'container_class'=>'col-sm-2']])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'name','label'=>'Title', 'container_class'=>'col-sm-6']])
<div class="clearfix"></div>
@include('form.textarea',['var'=>['name'=>'body','params'=>['class'=>''],'label'=>'Body', 'container_class'=>'col-sm-6']])
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
            $("input[name=name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $content(module
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
            // during update the variable $$element or $content(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $content->id
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