@extends('template.app-frame')

<?php
/**
 * Variables used in this view file.
 * @var $module_name           string 'superheroes'
 * @var $mod                   Module
 * @var $element               string 'superhero'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('title')
    @parent
    {{str_singular($mod->title)}}
    @if(hasModulePermission($module_name,"create"))
        <a class="btn btn-xs" href="{{route("$module_name.create")}}" data-toggle="tooltip"
           title="Create a new {{lcfirst(str_singular($mod->title))}}"><i class="fa fa-plus"></i></a>
    @endif

    @if(hasModulePermission($module_name,"view-list"))
        <a class="btn btn-xs" href="{{route("$module_name.index")}}" data-toggle="tooltip"
           title="View list of {{lcfirst(str_plural($mod->title))}}"><i class="fa fa-list"></i></a>
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
        {{-- shows additional form input fields from views/{sys_name}/formfields.blade.php --}}
        @if (View::exists('modules.'.$module_name . '.form'))
            @include('modules.'.$module_name . '.form')
        @endif
        {{--Form actions--}}
        <div class="clearfix"></div>
        <div id="{{$module_name}}CtaBlock" class="btn-group pull-left cta-block no-margin col-md-12">
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
    {{--@if($mod->has_uploads == 'Yes')--}}
    {{--@include('modules.base.include.uploads')--}}
    {{--@endif--}}
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
@endsection
