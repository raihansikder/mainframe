<?php
use App\Mainframe\Helpers\View;
use App\ModuleGroup;

$currentModuleName = isset($module) ? $module->name : '';
$breadcrumbs = isset($module) ? View::breadcrumb($module) : [];

?>
<ul class="sidebar-menu">
    @if(user())
        <li><a href="{{route("home")}}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>
        <?php View::renderMenuTree(ModuleGroup::tree(), $currentModuleName, $breadcrumbs); ?>
        {{--<li class="header">LABELS</li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
    @endif
</ul>