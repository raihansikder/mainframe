<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'customisonotifications'
 * @var $mod                   \App\Module
 * @var $customisonotification             \App\Customisonotification Object that is being edited
 * @var $element               string 'customisonotification'
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
@include('form.input-text',['var'=>['name'=>'name','label'=>'Title','container_class'=>'col-md-6']])
@include('form.input-text',['var'=>['name'=>'type','label'=>'Type']])
<div class="clearfix"></div>


@include('form.select-array',['var'=>['name'=>'screen','label'=>'Open screen', 'options'=>array_merge([''=>'Select'],kv(\App\Apppopup::$screens)),'container_class'=>'col-md-4','params'=>['id'=>'screen']]])
@include('form.input-text',['var'=>['name'=>'link','label'=>'Link','container_class'=>'col-md-5']])
@include('form.input-checkbox',['var'=>['name'=>'in_app_browser','label'=>'In-App Browser?','container_class'=>'col-md-3']])
<?php
$var = ['name' => 'screen_params', 'label' => 'Screen Parameters', 'container_class' => 'col-md-4',];
if (isset($customisonotification)) {
    $var['value'] = json_encode($customisonotification->screen_params);
}
?>
<div id="screen_params_div">@include('form.textarea',compact('var'))</div>
<div class="clearfix"></div>

<div class="clearfix"></div>
<?php
$var = ['name' => 'data', 'label' => 'Data', 'container_class' => 'col-md-6'];
if (isset($customisonotification)) {
    $var['value'] = json_encode($customisonotification->data);
}
?>
@include('form.textarea',compact('var'))
@include('form.textarea',['var'=>['name'=>'content','label'=>'Description']])


<div class="clearfix"></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#target">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Target
                </a>
            </h5>
        </div>
        <div id="target" class="panel-collapse collapse" style="margin:15px 0;">

            <div class="col-md-12">
                {{-- installation_ref_events --}}
                <?php
                $var = [
                    'name' => 'installation_ref_events',
                    'label' => 'Installations from events',
                    'options' => kv(App\Installation::whereNotNull('ref_event')->distinct()->pluck('ref_event')),
                    'container_class' => 'col-md-6',
                    'params' => ['multiple' => true]
                ];
                ?>
                @include('form.select-array-multiple',['var'=>$var])

                {{-- user_country_ids --}}
                <?php
                $var = [
                    'name' => 'user_country_ids',
                    'label' => 'User country',
                    'query' => new \App\Country,
                    'container_class' => 'col-md-6',
                ];
                ?>
                @include('form.select-model-multiple', ['var'=>$var])

                @include('form.input-text',['var'=>['name'=>'signup_from', 'label'=>'Sign up from', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'signup_till', 'label'=>'Sign up till', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


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
            //$("input[name=name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $customisonotification(module
            // name singular) is not set, also there is no id is created
            // Following the convention of spyrframe you are only allowed to call functions
            /*******************************************************************/

            // your functions go here
            // function1();
            // function2();
            document.getElementById("in_app_browser").checked = 1;
        </script>
    @else
        <script type="text/javascript">
            /*******************************************************************/
            // Updating :
            // this is a place holder to write  the javascript codes that will run
            // while updating an element that has been already created.
            // during update the variable $$element or $customisonotification(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $customisonotification->id
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
        //show/hide the screen_params field based on screen field
        function showScreenParametersBasedOnScreenField() {
            var screen = $('select[name=screen]').val();
            if (screen) {
                $('#screen_params_div').show();
                console.log(screen);
            } else {
                $('#screen_params_div').hide();
                $('#screen_params').val("");
            }
        }

        //enable/disable the in_app_browser field based on link field
        function disableOpenInBrowserBasedOnLinkField() {
            var link = $('input[name=link]').val();
            var element = document.getElementById("in_app_browser");
            if (link) {
                $("#in_app_browser").attr("disabled", false);
            } else {
                $("#in_app_browser").attr("disabled", true);
                element.checked = 0;
            }
        }

        showScreenParametersBasedOnScreenField();
        $("select[name=screen]").on('change', function () {
            showScreenParametersBasedOnScreenField()
        });
        //disableOpenInBrowserBasedOnLinkField();
        $("input[name=link]").on('change', function () {
            //disableOpenInBrowserBasedOnLinkField()
        });
        /*******************************************************************/
        // frontend and Ajax hybrid validation
        /*******************************************************************/
        addValidationRulesForSaving(); // Assign validation classes/rules
        {{--enableValidation('{{$module_name}}'); // Instantiate validation function--}}

    </script>
@endsection
