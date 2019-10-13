<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name                string 'partnerlistings'
 * @var $mod                        \App\Module
 * @var $partnerlisting             \App\Partnerlisting Object that is being edited
 * @var $element                    string 'partnerlisting'
 * @var $element_editable           boolean
 * @var $uuid                       string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
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
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name(Banner title)']])
@include('form.select-array',['var'=>['name'=>'ref_event','label'=>'Event Name', 'options'=>array_merge([''=>'-'],kv(\App\Categorybanner::referralEvents()))]])
{{--@include('form.select-model',['var'=>['name'=>'ref_event','label'=>'Ref. Event', 'table'=>'users' ]])--}}
@include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country', 'table'=>'countries' ]])
@include('form.select-model',['var'=>['name'=>'partnercategory_id','label'=>'Category', 'table'=>'partnercategories','name_field'=>'name_ext' ]])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'url','label'=>'URL','container_class'=>'col-md-9']])
@include('form.select-array',['var'=>['name'=>'open_url','label'=>'Open Url', 'options'=>['external'=>'External','inapp'=>'In App']]])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'order','label'=>'Order','container_class'=>'col-sm-1']])
@include('form.select-array',['var'=>['name'=>'logo_position','label'=>'Logo Alignment', 'options'=>kv(\App\Categorybanner::$logo_positions)]])
@include('form.select-array',['var'=>['name'=>'is_published','label'=>'Published?', 'options'=>['0'=>'No','1'=>'Yes'],'editable' =>user()->isSuperUser()]])
@include('form.select-array',['var'=>['name'=>'require_auth','label'=>'Require auth?','options'=>['0'=>'No','1'=>'Yes']]])
@include('form.textarea',['var'=>['name'=>'login_popup_content','label'=>'Login Popup Content','container_class'=>'col-md-6']])
{{-- Normal text field --}}


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
{{--@include('form.select-array',['var'=>['name'=>'priority','label'=>'Priority', 'options'=>kv(\App\Task::$priorities),]])--}}

{{--@include('form.plain-text',['var'=>['label'=>'Recommender', 'value'=>'test', 'container_class'=>'col-sm-6']])--}}

@include('form.is_active')
{{-- ******************* Form ends *********************** --}}

@section('content-bottom')
    @parent
    <div class="clearfix"></div>
    <div class="featured_div">
        Following uploads are required for banner images.
        <div class="clearfix"></div>
        <div class="col-md-4 no-padding-l">
            <b>Logo</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Logo']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-horizontal</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-horizontal']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-portrait</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-vertical']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-horizontal-ipad</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-horizontal-ipad']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover-portrait-ipad</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-vertical-ipad']])
        </div>
        <div class="col-md-4 no-padding-l">
            <b>Cover photo web</b>
            @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-web']])
        </div>
    </div>

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
            // during creation of an element. As this stage $$element or $partnerlisting(module
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
            // during update the variable $$element or $partnerlisting(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $partnerlisting->id
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
