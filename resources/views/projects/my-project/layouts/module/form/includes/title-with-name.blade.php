<?php

/**
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor $view
 * @var \App\Module $module
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 */
$name = ($element->name) ? " - ".optional($element)->name : optional($element)->name;
$prefix = null;

if($element->isCreating()){
    $prefix = "Create New ";
}
?>

{{$prefix}} {{Str::singular($module->title)}} {{$name}}

@if($user->can('create', $element) && $element->isUpdating())
    <a class="btn btn-xs module-create-btn {{$module->name.'-module-create-btn'}}" href="{{route("$module->name.create")}}" data-toggle="tooltip"
       title="Create a new {{Str::singular($module->title)}}"><i class="fa fa-plus"></i></a>
@endif

@if($user->can("view-any", $model))
    <a class="btn btn-xs module-list-btn {{$module->name.'-module-list-btn'}}" href="{{route("$module->name.index")}}" data-toggle="tooltip"
       title="View list of {{Str::plural($module->title)}}"><i class="fa fa-list"></i></a>
@endif

@if($element->isCreated() && $view->showCloneBtn())
    <form class="pull-right module-clone-form" method="post" action="{{route($module->name.'.clone',$element->id)}}">
        @csrf
        <button class="btn" type="submit" style="background-color: transparent; font-size: 13px" title="Clone this element">
            <i class="fa fa-copy"></i>
        </button>
    </form>
@endif