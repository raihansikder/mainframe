{{Str::singular($module->title)}}

@if($user->can('create', $element))
    <a class="btn btn-xs" href="{{route("$module->name.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($module->title))}}"><i class="fa fa-plus"></i></a>
@endif

@if($user->can("view-any", $model))
    <a class="btn btn-xs" href="{{route("$module->name.index")}}" data-toggle="tooltip"
       title="View list of {{lcfirst(Str::plural($module->title))}}"><i class="fa fa-list"></i></a>
@endif