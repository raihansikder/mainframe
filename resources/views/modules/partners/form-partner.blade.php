@extends('template.app-frame')

<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'partners'
 * @var $mod                   \App\Module
 * @var $partner               \App\Partner Object that is being edited
 * @var $element               string 'partner'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('title')
    @parent
{{--    {{\Illuminate\Support\Str::singular($mod->title)}}--}}
{{--    @if(hasModulePermission($module_name,'create'))--}}
{{--        <a class="btn btn-xs" href="{{route("$module_name.create")}}" data-toggle="tooltip"--}}
{{--           title="Create a new {{lcfirst(\Illuminate\Support\Str::singular($mod->title))}}"><i--}}
{{--                    class="fa fa-plus"></i>--}}
{{--        </a>--}}
{{--    @endif--}}

    Image Upload

    @if(hasModulePermission($module_name,'view-list'))
        <a class="btn btn-xs" href="{{route("$module_name.index")}}" data-toggle="tooltip"
           title="View list of {{lcfirst(\Illuminate\Support\Str::plural($mod->title))}}"><i class="fa fa-list"></i>
        </a>
    @endif
@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(isset($$element))
            {!! Form::model($$element, ['files'=> true,'route'=>[$module_name . '.update', $$element->id],'name'=>$module_name, 'method'=>'patch','id'=>$module_name . 'Form', 'class'=>$module_name . "-form module-base-form edit-form" ]) !!}
        @elseif(hasModulePermission($module_name,'create'))
            {{ Form::open(['route' => $module_name.'.store','class'=>$module_name . "-form module-base-form create-form",'name'=>$module_name, 'files'=>true]) }}
            <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @endif
        @if(tenantUser())
            <input name="tenant_id" type="hidden" value="{{userTenantId()}}"/>
        @endif

        {{--Form actions--}}
        <div class="clearfix"></div>
        <div id="{{$module_name}}CtaBlock" class="btn-group pull-left cta-block no-margin col-md-12 hidden">
            <a id="{{$module_name}}CancelBtn" class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
            @if(((isset($$element) && $element_editable)) || (!isset($$element) && hasModulePermission($module_name,'create')))
                <input name="redirect_success" type="hidden"
                       value="{{ Request::has('redirect_success')?Request::get('redirect_success'): route($module_name.".index") }}"/>
                <input name="redirect_fail" type="hidden"
                       value="{{ Request::has('redirect_fail')?Request::get('redirect_fail'): URL::full() }}"/>
                <input name="ret" type="hidden" value="{{Request::get('ret')}}"/>
                <button id="{{$module_name}}SubmitBtn" type="submit" class="btn btn-success">Save</button>
            @endif

            {{-- Delete modal --}}
            @if(isset($$element) && $$element->isDeletable())
                <div class="pull-right delete-cta no-padding">
                    {!! deleteBtn(route($module_name.".destroy",$$element->id),route($module_name.".index")) !!}
                </div>
            @endif
            @if(isset($$element))
                <a target="_blank" class="btn btn-default pull-right"
                   href="{{route("$module_name.changes",$$element->id)}}">Change log</a>
            @endif
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <h5> Send new marketing assets to <a href="mailto:letshelp@letsbab.com?Subject=Letsbab%20Partner%20image%20upload">letshelp@letsbab.com</a>
        or upload them below. LetsBab team will review the assets and take further action.</h5>
    <div class="col-md-4 no-padding-l">
        <b>Marketing materials</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>20,'type'=>'Partner-uploads']])
    </div>
@endsection

@section('js')
    @parent
    <?php
    // during creation #new indicates that user should be redirected to the newly created item.
    // during update this value indicates that user is redirect back to same item after successful update

    $redirect_success = '#new';
    if (isset($$element)) {
        $redirect_success = URL::full();
    }
    if (Request::has('redirect_success')) {
        $redirect_success = Request::get('redirect_success');
    }
    $redirect_fail = URL::full();
    ?>
    <script>
        $('form[name={{$module_name}}] input[name=redirect_success]').val('{{$redirect_success}}');
        $('form[name={{$module_name}}] input[name=redirect_fail]').val('{{$redirect_fail}}');
    </script>
    <script type="text/javascript">
        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            // $("input[name=name],input[name=live_url_root],select[name=country_id],input[name=category_id],input[name=address1],input[name=contact_name],input[name=contact_email],input[name=contact_phone],select[name=is_featured],input[name=commission],input[name=commission_percentage_lb],input[name=commission_percentage_recommender],input[name=recommendation_expiry_in_days],input[name=recommend_expire],select[name=partnercategory_id]").addClass('validate[required]');
            // $("input[name=contact_email],input[name=finance_contact_email],input[name=it_contact_email]").addClass('validate[email]');
            // $("input[name=live_url_root]").addClass('validate[url]');
            // $("input[name=commission_percentage_lb],input[name=commission_percentage_recommender],input[name=recommendation_expiry_in_days]").addClass('validate[custom[number]]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $partner(module
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
            // during update the variable $$element or $partner(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $partner->id
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
        // enableValidation('{{$module_name}}'); // Instantiate validation function


        //        $(function () {
        //            var is_featured = $("#is_featured option:selected").val();
        //            displayFeaturedDiv(is_featured);
        //            $("#is_featured").change(function () {
        //                var is_featured = $(this).val();
        //                displayFeaturedDiv(is_featured);
        //            });
        //        });
        //
        //        function displayFeaturedDiv(is_featured) {
        //            if (is_featured == "1") {
        //                $(".featured_div").css('display', 'block');
        //            } else {
        //                $(".featured_div").css('display', 'none');
        //            }
        //        }

    </script>

@endsection
