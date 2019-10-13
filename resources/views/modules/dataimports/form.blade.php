<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'dataimports'
 * @var $mod                   \App\Module
 * @var $dataimport             \App\Dataimport Object that is being edited
 * @var $element               string 'dataimport'
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
    @if(isset($dataimport))
        @if(user()->isSuperUser())
            <?php
            $upload = $dataimport->uploads->first();
            ?>
            @if(isset($upload))
                <div class="btn-group" style="padding-bottom: 15px">
                    <a class="btn btn-default" target="_blank"
                       href="{{asset('report-data/analytic-report?upload_id='.$upload->id.'&mode=view')}}">View</a>
                </div>
            @endif
        @endif
    @endif
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
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name']])
@include('form.select-array',['var'=>['name'=>'type','label'=>'Type', 'options'=>['ios'=>'iOS','android'=>'Android']]])
@include('form.input-text',['var'=>['name'=>'status','label'=>'Status']])
<div class='clearfix'></div>
@include('form.textarea',['var'=>['name'=>'description','label'=>'Description']])
<div class='clearfix'></div>

@include('form.is_active')
{{-- ******************* Form ends *********************** --}}

@section('content-bottom')
    @parent
    <div class="col-md-4 no-padding-l">
        <b>'Data Import' files</b><br>
        <small>Upload file in CSV format (.csv)</small>
        @include('modules.base.include.uploads',['var'=>['limit'=>99,'type'=>'Data import']])
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
            // during creation of an element. As this stage $$element or $dataimport(module
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
            // during update the variable $$element or $dataimport(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $dataimport->id
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
