@extends('projects.my-project.layouts.module.form.template')
{{--@extends('mainframe.layouts.module.form.template')--}}
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\Schedules\Schedule $element
 */

use App\Mainframe\Modules\Modules\Module;
use App\Projects\MphMarket\Modules\Schedules\Schedule;

$repeatOptions = kv(Schedule::$repeatOptions);
$dateTags = Schedule::$dateTags;
$triggerActions = Schedule::$triggerActions;
$jobOptions = Schedule::$jobs;



$moduleBackLink = null;

if ($element->module_id && $element->element_id) {
    $linkedModule = Module::find($element->module_id);
    $moduleBackLink = route($linkedModule->name.'.edit', $element->element_id);
}

if (in_array(request('ref'), ['order', 'quote']) || $element->isCreated()) {
    $immutables = array_merge($immutables, [
        'job',
        'module_id',
        'element_id',
    ]);
}

?>

@section('content-top')
    @parent
    @if($moduleBackLink)
        <a class="btn btn-default" href="{{$moduleBackLink}}">
            <i class="fa fa-angle-left"></i> {{$linkedModule->title}} #{{$element->element_id}}
        </a>
    @endif
@endsection


@section('content')

    <div class="clearfix"></div>
    @if($element->isCreated())
        <div class="alert alert-info alert-dismissible col-md-6" style="margin-top:20px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Alert!</h4>
            Any change made to this schedule will impact the future entries.
        </div>
    @endif

    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{-- **************************************** --}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.select-array',['var'=>['name'=>'job','label'=>'Job', 'options'=>$jobOptions]])
        <div class="clearfix"></div>

        @include('form.select-model',['var'=>['name'=>'module_id','label'=>'Module', 'table'=>'modules', 'name_field'=>'title']])
        @include('form.text',['var'=>['name'=>'element_id','label'=>'Item Id']])

        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'repeat','label'=>'Repeat', 'options'=>$repeatOptions]])

        @include('form.date',['var'=>['name'=>'ends_on','label'=>'Ends on']])
        <div class="clearfix"></div>
        @include('form.tags',['var'=>['name'=>'repeat_dates','label'=>'Dates','tags'=>$dateTags]])

        {{-- @include('form.text',['var'=>['name'=>'max_repeats','label'=>'No. of Repeats']])--}}
        {{-- @include('form.select-array',['var'=>['name'=>'trigger','label'=>'Perform Action', 'options'=>kv($triggerActions)]])--}}

        @include('form.is-active')
        {{--  ******** Form inputs: ends ************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{-- <div class="col-md-6 no-padding-l"><h5>File upload</h5><small>Upload one or more files</small>@include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])</div>--}}

    @if($element->isCreated())
        @include('projects.my-project.modules.schedules.form.includes.schedule-entries')
    @endif
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.schedules.form.js')
@endsection