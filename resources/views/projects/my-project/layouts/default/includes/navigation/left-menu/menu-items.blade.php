<?php

use App\Mainframe\Helpers\View;
use App\Mainframe\Modules\ModuleGroups\ModuleGroup;

$currentModuleName = isset($module) ? $module->name : '';
$breadcrumbs = isset($module) ? View::breadcrumb($module) : [];

?>

@include('projects.my-project.layouts.default.includes.navigation.left-menu.menu-items-admin')
