<?php
use App\Mainframe\Helpers\View;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;

$currentModuleName = isset($module) ? $module->name : '';
$breadcrumbs = isset($module) ? View::breadcrumb($module) : [];

?>

@if(user()->ofReseller())
    @include('projects.my-project.layouts.default.includes.navigation.left-menu.menu-items-reseller')
@elseif(user()->ofVendor())
    @include('projects.my-project.layouts.default.includes.navigation.left-menu.menu-items-vendor')
@elseif(user()->isSalesMember() || user()->isSalesAdmin())
    @include('projects.my-project.layouts.default.includes.navigation.left-menu.menu-items-sales')
@else
    @include('projects.my-project.layouts.default.includes.navigation.left-menu.menu-items-admin')
@endif
