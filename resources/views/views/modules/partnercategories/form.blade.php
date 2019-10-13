<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name                 string 'partnercategories'
 * @var $mod                         \App\Module
 * @var $partnercategory             \App\Partnercategory Object that is being edited
 * @var $element                     string 'partnercategory'
 * @var $element_editable            boolean
 * @var $uuid                        string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.select-model',['var'=>['name'=>'parent_id','label'=>'Parent category','table'=>'partnercategories', 'name_field'=>'name_ext', 'container_class'=>'col-sm-3']])
<div class="clearfix"></div>
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'order','label'=>'Order', 'container_class'=>'col-sm-2']])
@include('form.textarea',['var'=>['name'=>'description','label'=>'Description', 'container_class'=>'col-sm-6']])
<div class="clearfix"></div>
@include('form.select-model',['var'=>['name'=>'featured_partner_id','label'=>'Featured partner','table'=>'partners']])
<div class="clearfix"></div>
@include('form.is_active')
@section('content-bottom')
    @parent
    <h5>Uploads</h5>
    <div class="col-md-4 no-padding-l">
        <b>Block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Block-logo']])
    </div>
    <div class="col-md-4 no-padding-l">
        <b>Web app block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Webapp-block-logo']])
    </div>
    <div class="col-md-4 no-padding-l">
        <b>iPad Horizontal Block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-horizontal']])
    </div>
    <div class="col-md-4 no-padding-l">
        <b>iPad Vertical Block Logo</b>
        @include('modules.base.include.uploads',['var'=>['limit'=>1,'type'=>'Cover-vertical']])
    </div>
    <div class="clearfix"></div>

    @if(isset($partnercategory))
        {{--<div class="col-md-6  shadow" style="margin: 10px 0 10px; padding: 10px">--}}
        {{--<h4 class="pull-left">Listings</h4>--}}
        {{--<div class="clearfix"></div>--}}
        {{--<table class="table">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>Country</th>--}}
        {{--<th>Order</th>--}}
        {{--<th>Active</th>--}}
        {{--<th>Edit</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--@foreach($partnercategory->listings()->orderBy('order','ASC')->get() as $listing)--}}

        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td>{{$listing->country()->exists() ? $listing->country->name: '-'}}</td>--}}
        {{--<td>{{$listing->order}}</td>--}}
        {{--<td>@if($listing->is_active) Yes @else No @endif </td>--}}
        {{--<td><a href="{{route('partnerlistings.edit',$listing->id)}}">Edit</a></td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
        {{--@endforeach--}}
        {{--</table>--}}

        {{--<a class="btn pull-left  btn-default"--}}
        {{--href="{{route('partnercategorylistings.create')}}?partnercategory_id={{$partnercategory->id}}&redirect_success={{URL::full()}}">Create--}}
        {{--new</a>--}}

        {{--</div>--}}
    @endif

@endsection

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
            // during creation of an element. As this stage $$element or $partnercategory(module
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
            // during update the variable $$element or $partnercategory(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $partnercategory->id
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