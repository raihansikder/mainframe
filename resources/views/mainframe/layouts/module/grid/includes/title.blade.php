<span style="padding-right: 20px">{{$currentModule->title}}</span>
@if(hasModulePermission($moduleName,"create"))
    <a class="btn btn-xs btn-success" href="{{route("$moduleName.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($currentModule->title))}}"><i class="fa fa-plus"></i> &nbsp;CREATE NEW </a>
@endif


@if(hasModulePermission($moduleName,"report"))
    <a href="{{\App\Report::defaultForModule($currentModule->id)}}" class="btn btn-default btn-xs"
       title="View advanced report with filters, excel export etc."
       target="_blank">
        <i class="fa fa-file-excel-o"></i> &nbsp;VIEW ADVANCED REPORT
    </a>
@endif
