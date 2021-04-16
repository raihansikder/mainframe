<?php

/**
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor $view
 * @var \App\Module $module
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 */

$name = ($element->name) ? " - ".optional($element)->name : optional($element)->name;
$moduleState = null;
if (!$element->is_active) {
    $moduleState = "Archived";
}
?>

{{$moduleState}} {{Str::singular($module->title)}} {{$name}}

@if($user->can('create', $element))
    <a class="btn btn-xs module-create-btn {{$module->name.'-module-create-btn'}}" href="{{route("$module->name.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($module->title))}}"><i class="fa fa-plus"></i></a>
@endif

@if($user->can("view-any", $model))
    <a class="btn btn-xs module-list-btn {{$module->name.'-module-list-btn'}}" href="{{route("$module->name.index")}}" data-toggle="tooltip"
       title="View list of {{lcfirst(Str::plural($module->title))}}"><i class="fa fa-list"></i></a>
@endif