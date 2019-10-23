<span style="padding-right: 20px">{{$module->title}}</span>
@if(hasModulePermission($module->name,"create"))
    <a class="btn btn-xs btn-success" href="{{route("$module->name.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($module->title))}}"><i class="fa fa-plus"></i> &nbsp;CREATE NEW </a>
@endif


@if(hasModulePermission($module->name,"report"))
    <a href="{{\App\Report::defaultForModule($module->id)}}" class="btn btn-default btn-xs"
       title="View advanced report with filters, excel export etc."
       target="_blank">
        <i class="fa fa-file-excel-o"></i> &nbsp;VIEW ADVANCED REPORT
    </a>
@endif
