<?php
/** @noinspection SuspiciousAssignmentsInspection */
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'apppopups'
 * @var $mod                   \App\Module
 * @var $apppopup             \App\Apppopup Object that is being edited
 * @var $element               string 'apppopup'
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
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name']])
@include('form.select-array',['var'=>['name'=>'priority','label'=>'Priority', 'options'=>kv(\App\Apppopup::$priorities)]])


{{-- Template --}}
<div class='clearfix'></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#template">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Template
                </a>
            </h5>
        </div>
        <div id="template" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                @include('form.select-array',['var'=>['name'=>'template','label'=>'Template', 'options'=>kv(\App\Apppopup::$templates),'container_class'=>'col-sm-3']])
                @include('form.select-array',['var'=>['name'=>'type','label'=>'Type', 'options'=>kv(\App\Apppopup::$types),'container_class'=>'col-sm-3']])

                @include('form.select-array',['var'=>['name'=>'is_modal','label'=>'Is Modal?', 'options'=>['0'=>'No','1'=>'Yes']]])

                <?php
                $var = ['name' => 'template_config', 'label' => 'Additional template config(JSON)'];
                if (isset($apppopup)) {
                    $var['value'] = json_encode($apppopup->template_config);
                }
                ?>
                @include('form.textarea',compact('var'))
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{{--Content--}}
<div class='clearfix'></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#content">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Content
                </a>
            </h5>
        </div>
        <div id="content" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                @include('form.input-text',['var'=>['name'=>'title','label'=>'Popup title','container_class'=>'col-md-6']])
                <div class="clearfix"></div>
                @include('form.textarea',['var'=>['name'=>'body','label'=>'Popup body','container_class'=>'col-md-12']])
            </div>

            <div class="clearfix"></div>
            <div class="col-md-4">
                <h4>CTA Button 1(Primary)</h4>
                @include('form.select-array',['var'=>['name'=>'cta1_is_enabled','label'=>'Enabled?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-6']])
                @include('form.input-text',['var'=>['name'=>'cta1_label','label'=>'Label','container_class'=>'col-md-12']])
                @include('form.select-array',['var'=>['name'=>'cta1_action','label'=>'Action', 'options'=>kv(\App\Apppopup::$actions),'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'cta1_link','label'=>'Link','container_class'=>'col-md-12']])
                @include('form.select-array',['var'=>['name'=>'cta1_open_screen','label'=>'Open screen', 'options'=>kv(\App\Apppopup::$screens),'container_class'=>'col-md-12']])
                <?php
                $var = ['name' => 'cta1_config', 'label' => 'Additional button config(JSON)', 'container_class' => 'col-md-12'];
                if (isset($apppopup)) {
                    $var['value'] = json_encode($apppopup->cta1_config);
                }
                ?>
                @include('form.textarea',compact('var'))
            </div>
            <div class="col-md-4">
                <h4>CTA Button 2</h4>
                @include('form.select-array',['var'=>['name'=>'cta2_is_enabled','label'=>'Enabled?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-6']])
                @include('form.input-text',['var'=>['name'=>'cta2_label','label'=>'Label','container_class'=>'col-md-12']])
                @include('form.select-array',['var'=>['name'=>'cta2_action','label'=>'Action', 'options'=>kv(\App\Apppopup::$actions),'container_class'=>'col-md-12']])
                @include('form.input-text',['var'=>['name'=>'cta2_link','label'=>'Link','container_class'=>'col-md-12']])
                @include('form.select-array',['var'=>['name'=>'cta2_open_screen','label'=>'Open screen', 'options'=>kv(\App\Apppopup::$screens),'container_class'=>'col-md-12']])
                <?php
                $var = ['name' => 'cta2_config', 'label' => 'Additional button config(JSON)', 'container_class' => 'col-md-12'];
                if (isset($apppopup)) {
                    $var['value'] = json_encode($apppopup->cta2_config);
                }
                ?>
                @include('form.textarea',compact('var'))
            </div>
            <div class="col-md-4">
                <h4>Close Button</h4>
                @include('form.select-array',['var'=>['name'=>'btn_close_is_enabled','label'=>'Enabled?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-6']])
                {{--@include('form.input-text',['var'=>['name'=>'btn_close_label','label'=>'Label','container_class'=>'col-md-12']])--}}
                {{--@include('form.select-array',['var'=>['name'=>'btn_close_action','label'=>'Action', 'options'=>kv(\App\Apppopup::$actions),'container_class'=>'col-md-12']])--}}
                {{--@include('form.input-text',['var'=>['name'=>'btn_close_link','label'=>'Link','container_class'=>'col-md-12']])--}}
                {{--@include('form.select-array',['var'=>['name'=>'btn_close_open_screen','label'=>'Open screen', 'options'=>kv(\App\Apppopup::$screens),'container_class'=>'col-md-12']])--}}
                <?php
                //$var = ['name' => 'btn_close_config', 'label' => 'Additional config(JSON)', 'container_class' => 'col-md-12'];
                //if (isset($apppopup)) {
                //   $var['value'] = json_encode($apppopup->btn_close_config);
                // }
                ?>
                {{--@include('form.textarea',compact('var'))--}}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


{{--Rules--}}
<div class='clearfix'></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#rules">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Conditions
                </a>
            </h5>
        </div>
        <div id="rules" class="panel-collapse collapse" style="margin:15px 0;">

            <div class="col-md-12">
                <h4>Placement/Screen</h4>
                @include('form.select-array',['var'=>['name'=>'screen','label'=>'Screen', 'options'=>kv(\App\Apppopup::$screens),'container_class'=>'col-md-6']])

                <div class='clearfix'></div>

                <h4>When to show</h4>
                @include('form.input-text',['var'=>['name'=>'from', 'label'=>'From date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'till', 'label'=>'Till date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.select-array',['var'=>['name'=>'on_first_open','label'=>'On First Open?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-2']])
                @include('form.select-array',['var'=>['name'=>'show_once','label'=>'Show once?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-2']])
                <div class='clearfix'></div>

                <h4>Conditions</h4>
                @include('form.select-array',['var'=>['name'=>'outdated_app','label'=>'Outdated app?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'brand_open_count','label'=>'Brand open count','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'charity_open_count','label'=>'Charity open count','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'recommendation_count','label'=>'Recommendations','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'conversion_count','label'=>'Conversions','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'time_in_app','label'=>'Time in app(sec)','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'total_earned','label'=>'Earned','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'total_shared','label'=>'Shared','container_class'=>'col-md-2']])


                @include('form.input-text',['var'=>['name'=>'stat_total_commission_to_date_in_lb_currency','label'=>'Total commission in LB currency','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_total_amounts_paid_to_date_in_lb_currency','label'=>'Total amounts paid in LB currency','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_amount_due_in_lb_currency','label'=>'Amount due in LB currency','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_total_donation_to_date_in_lb_currency','label'=>'Total donation in LB currency','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_donation_due_in_lb_currency','label'=>'Donation due in LB currency','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_no_of_successful_recommendations','label'=>'No of successful recommendations','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'stat_avg_buzz_of_rate','label'=>'Avg buzz of rate','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'next_payment_on','label'=>'Next payment on','container_class'=>'col-md-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'next_payment_in_lb_currency','label'=>'Next payment in LB','container_class'=>'col-md-2']])
                @include('form.input-text',['var'=>['name'=>'last_payment_on','label'=>'Last payment on','container_class'=>'col-md-2','params'=>['class'=>'datepicker']]])

                <div class='clearfix'></div>
                @include('form.input-text',['var'=>['name'=>'signup_from', 'label'=>'Signup from date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'signup_till', 'label'=>'Signup till date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])

                {{--@include('form.select-array',['var'=>['name'=>'ref_event','label'=>'Ref event', 'options'=>array_merge([''=>'Select'],kv(App\Installation::whereNotNull('ref_event')->distinct()->pluck('ref_event'))),'container_class'=>'col-md-4']])--}}
                <div class='clearfix'></div>
                <h4>User types</h4>
                @include('form.select-array',['var'=>['name'=>'is_guest','label'=>'Guest user?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-2']])
                @include('form.select-array',['var'=>['name'=>'is_test','label'=>'Test user?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-md-2']])

                <div class='clearfix'></div>
                <h4>User country/region restriction</h4>
                <?php
                $var = [
                'name' => 'included_country_ids',
                'label' => 'Allowed countries',
                'query' => new \App\Country,
                'container_class' => 'col-md-6',
                ];
                ?>
                @include('form.select-model-multiple',compact('var'))


                <?php
                $var = [
                'name' => 'excluded_country_ids',
                'label' => '- OR - Excluded Countries',
                'query' => new \App\Country,
                'container_class' => 'col-md-6'
                ];
                ?>
                @include('form.select-model-multiple', compact('var'))
                {{--                included_region_ids--}}
                {{--                excluded_region_ids--}}

                <div class='clearfix'></div>
                <h4>Additional rules</h4>

                <?php
                $var = ['name' => 'additional_rules', 'label' => 'Additional rules(JSON)', 'container_class' => 'col-md-12'];
                if (isset($apppopup)) {
                $var['value'] = json_encode($apppopup->additional_rules);
                }
                ?>
                @include('form.textarea',compact('var'))
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


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
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $apppopup(module
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
            // during update the variable $$element or $apppopup(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $apppopup->id
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
