<span style="padding-right: 20px">{{$module->title}}</span>

@if(hasModulePermission($module->name,"create"))
    <a href="{{route("$module->name.create")}}" data-toggle="tooltip"
       title="Create a new {{lcfirst(Str::singular($module->title))}}"><i class="fa fa-plus-circle"></i> </a>
@endif


@if(hasModulePermission($module->name,"report"))
    <a href="{{\App\Mainframe\Modules\Reports\Report::defaultForModule($module->id)}}" class="pull-right"
       title="View advanced report with filters, excel export etc."
       data-toggle="tooltip"
       target="_blank">
        <i class="fa fa-file-text"></i> &nbsp;
    </a>
@endif
