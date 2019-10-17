{{Str::singular($currentModule->title)}}
@if(hasModulePermission($moduleName,"create"))
    <a class="btn btn-xs" href="{{route("$moduleName.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($currentModule->title))}}"><i class="fa fa-plus"></i></a>
@endif

@if(hasModulePermission($moduleName,"view-list"))
    <a class="btn btn-xs" href="{{route("$moduleName.index")}}" data-toggle="tooltip"
       title="View list of {{lcfirst(Str::plural($currentModule->title))}}"><i class="fa fa-list"></i></a>
@endif