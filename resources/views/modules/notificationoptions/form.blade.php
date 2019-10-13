<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'notificationoptions'
 * @var $mod                   \App\Module
 * @var $notificationoption             \App\Notificationoption Object that is being edited
 * @var $element               string 'notificationoption'
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
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name','container_class'=>'col-md-6']])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'code','label'=>'Code','container_class'=>'col-md-6']])
@include('form.input-text',['var'=>['name'=>'order','label'=>'Order','container_class'=>'col-md-3']])

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
            $("input[name=code]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $notificationoption(module
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
            // during update the variable $$element or $notificationoption(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $notificationoption->id
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
