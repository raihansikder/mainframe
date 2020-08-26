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
 * @var \App\Projects\MphMarket\Modules\SalesTasks\SalesTask $element
 */
use App\Mainframe\Modules\Users\User;
use App\Projects\MphMarket\Modules\SalesTasks\SalesTask;

$statuses = kv(SalesTask::$statuses);
$priorities = kv(SalesTask::$priorities);
$repeatTasks = kv(SalesTask::$repeatTasks);
$taskTypes = kv(SalesTask::$taskTypes);
$taskReminders = kv(SalesTask::$taskReminders);
$customerTypes = kv(SalesTask::$customerTypes);
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{-- **************************************** --}}
        @if($element->id)
            @include('form.plain-text',['var'=>['name'=>'id','label'=>'ID','value'=>$element->id]])
            @include('form.select-model',['var'=>['name'=>'created_by','label'=>'Creator','table'=>'users','editable'=>false]])
        @endif
        <?php
        if ($element) {
            $varAssignee = [
                'name' => 'assignee_id', 'label' => 'Assignee', 'table' => 'users',
                'query' => DB::table('users')->where('group_ids', '["28"]')->orWhere('group_ids', '["29"]')->orWhere('id', $element->created_by)
            ];
        }
        ?>
        @if($element->id)
            @include('form.select-model',['var'=>$varAssignee])
        @endif
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'title','label'=>'Title','div'=>'col-md-6']])
        @include('form.select-model',['var'=>['name'=>'reseller_id','label'=>'Partner','table'=>'resellers']])
        @include('form.datetime',['var'=>['name'=>'due_date','label'=>'Due At']])
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        @include('form.select-array',['var'=>['name'=>'priority','label'=>'Priority', 'options'=>$priorities]])
        @include('form.select-array',['var'=>['name'=>'repeat_task','label'=>'Repeat Task', 'options'=>$repeatTasks]])
        @include('form.select-array',['var'=>['name'=>'task_reminder','label'=>'Task Reminder', 'options'=>$taskReminders]])
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'tasktype','label'=>'Task Type', 'options'=>$taskTypes]])
        @include('form.text',['var'=>['name'=>'tasktype_other','label'=>'Task Type Other','div'=>'col-md-6']])
        <div class="clearfix"></div>
        @include('projects.my-project.modules.sales-tasks.includes.notes')
        <div class="clearfix"></div>
        @include('projects.my-project.modules.sales-tasks.includes.partner-attributes')
        @if($element->id)
            @include('projects.my-project.modules.sales-tasks.includes.assignments')
        @endif
        @include('form.is-active')
        {{--  ******** Form inputs: ends ************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{-- <div class="col-md-6 no-padding-l"><h5>File upload</h5><small>Upload one or more files</small>@include('mainframe.layouts.module.form.includes.features.uploads.uploads',['var'=>['limit'=>99]])</div>--}}
@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.sales-tasks.form.js')
@endsection