<?php

$name = ($element->name) ? " - ".optional($element)->name : optional($element)->name;

$moduleState = null;
if ($module->id == 86 && $element->isArchived()) {
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