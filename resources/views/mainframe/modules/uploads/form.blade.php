<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables
 * @var $moduleName      string 'uploads'
 * @var $currentModule              Module
 * @var $upload           Upload Object that is being edited
 * @var $element          string 'upload'
 * @var $editable boolean
 * @var $uuid             string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'div'=>'col-sm-6']])
{{--@include('form.select-model',['var'=>['name'=>'uploadtype_id','label'=>'Type', 'table'=>'uploadtypes', 'div'=>'col-sm-3']])--}}
@include('form.input-text',['var'=>['name'=>'order','label'=>'Order', 'div'=>'col-sm-2']])

@if(isset($upload))
    <div class="clearfix"></div>
    <div class="col-md-6 no-padding-l">
        <a href="{{route('download', $upload->uuid)}}">
            @if($upload->isImage())
                <img src="{{ $upload->url}}" alt=""/>
            @else
                <img src="{{ $upload->extIconPath() }}" alt=""/>
            @endif
        </a>
        <div class='clearfix'></div>
        {{$upload->name}}
        {{$upload->ext}}
        {{--<b>--}}
        {{--{{FileSizeConvert(filesize($upload->absPath()))}}--}}
        {{--</b>--}}

    </div>
@endif
<div class="clearfix"></div>
@include('form.textarea',['var'=>['name'=>'desc','label'=>'Description', 'div'=>'col-sm-6']])
{{--@include('form.is_active')--}}
{{-- Form ends --}}
@section('content-bottom')
    @parent
    {{--@if(isset($upload))--}}
    {{--<div class="col-md-6 no-padding-l">--}}
    {{--<h4>File</h4>--}}
    {{--<small></small>--}}
    {{--@include('modules.uploads.update_uploads',['var'=>['id'=>$upload->id]])--}}
    {{--</div>--}}
    {{--@endif--}}
@endsection
{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        @if(!isset($$element))
        /*******************************************************************/
        // Creating :
        // this is a place holder to write  the javascript codes
        // during creation of an element. As this stage $$element or $upload(module
        // name singular) is not set, also there is no id is created
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();
        @elseif(isset($$element))
        /*******************************************************************/
        // Updating :
        // this is a place holder to write  the javascript codes that will run
        // while updating an element that has been already created.
        // during update the variable $$element or $upload(module
        // name singular) is set, and id like other attributes of the element can be
        // accessed by calling $$element->id, also $upload->id
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();
        @endif


        /*******************************************************************/
        // Saving :
        // Saving covers both creating and updating (Similar to Eloquent model event)
        // However, it is not guaranteed $$element is set. So the code here should
        // be functional for both case where an element is being created or already
        // created. This is a good place for writing validation
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();

        /*******************************************************************/
        // frontend and Ajax hybrid validation
        /*******************************************************************/
        addValidationRulesForSaving(); // Assign validation classes/rules
        enableValidation('{{$moduleName}}'); // Instantiate validation function

        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            $('input[name=name]').addClass('validate[required]');
        }
    </script>
@endsection
{{-- JS ends --}}