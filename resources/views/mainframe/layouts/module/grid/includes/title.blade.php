<span style="padding-right: 20px">{{$module->title}}</span>

@if($user->can('create',$model))
    <a href="{{route("$module->name.create")}}" data-toggle="tooltip" class="module-create-btn {{$module->name.'-module-create-btn'}}"
       title="Create a new {{lcfirst(Str::singular($module->name))}}">
        <i class="fa fa-plus-circle"></i>
    </a>
@endif


@if($user->can('view-any',$model))
    <a href="{{\App\Mainframe\Modules\Reports\Report::defaultForModule($module->id)}}"
       class="pull-right module-list-btn {{$module->name.'-module-list-btn'}}"
       title="View advanced report with filters, excel export etc."
       data-toggle="tooltip"
       target="_blank">
        <i class="fa fa-file-text"></i> &nbsp;
    </a>
@endif
