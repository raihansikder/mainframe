@extends('mainframe.layouts.module.form.layout')

@section('content')
    <div class="col-md-12 no-padding">

        @if(($formState === 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState === 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{--    Form inputs: starts    --}}
        {{--   --------------------    --}}
        @include('mainframe.form-elements.text.input-text',['var'=>['name'=>'name','label'=>'Name']])
        @include('mainframe.form-elements.custom.is_active')
        {{--    Form inputs: ends    --}}
        <div class="clearfix"></div>
        @if($formState === 'edit')
            <h4>Permissions</h4>
            <div id="vue_root_permission" class="permissions-tree">
                <ul>
                    <li><label>
                            <input name='permission[]' type='checkbox' v-model='permission' value='superuser'
                                   data-toggle="tooltip" title="Assign super admin permission"/>
                            <b>Super user</b>
                        </label>
                    </li>
                    <li>{{renderModulePermissionTree(\App\Mainframe\Modules\Modules\ModuleGroup::tree()) }}</li>
                    @include('mainframe.modules.groups.form.permission-blocks')
                </ul>
            </div>
        @endif
        @include('mainframe.layouts.module.form.includes.action-buttons')

        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    <div class="col-md-6 no-padding-l">
        <h5>File upload</h5>
        <small>Upload one or more files</small>
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])
    </div>
@endsection

@section('js')
    @parent
    @include('mainframe.modules.groups.form.js')
@endsection