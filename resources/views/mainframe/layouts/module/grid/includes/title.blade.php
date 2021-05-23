<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor $view */
?>

<span style="padding-right: 20px">{{$view->formTitle()}}</span>

@if($view->show('form-create-btn'))
    <a href="{{route("$module->name.create")}}" data-toggle="tooltip"
       class="module-create-btn {{$module->name.'-module-create-btn'}}"
       title="Create a new {{lcfirst(Str::singular($module->title))}}">
        <i class="fa fa-plus-circle"></i>
    </a>
@endif


@if($view->show('report-link'))
    <a href="{{route($module->name.'.report')}}"
       class="pull-right module-list-btn {{$module->name.'-module-list-btn'}}"
       title="View advanced report with filters, excel export etc."
       data-toggle="tooltip"
       target="_blank">
        <i class="fa fa-file-text"></i> &nbsp;
    </a>
@endif
