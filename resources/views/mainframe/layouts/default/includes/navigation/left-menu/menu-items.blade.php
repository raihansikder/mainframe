<ul class="sidebar-menu">
    @if(user())
        <li><a href="{{route("home")}}"><i class="fa fa-desktop"></i><span>Dashboard</span></a></li>

        @if(user()->isSuperUser())
            {{--<li class="header">MENU</li>--}}
            <?php
            /****************************************************************************************************
             * Renders the left menu of the application
             * $current_module_name and $breadcrumbs are passed to render function to expand the currently active
             * tree items. render function checks if $current_module_name is available in $breadcrumb.
             ****************************************************************************************************/
            $current_module_name = '';
            $breadcrumbs = [];
            if (isset($currentModule)) {
                $current_module_name = $currentModule->name;
                $breadcrumbs         = breadcrumb($currentModule);
            }
            renderMenuTree(\App\ModuleGroup::tree(), $current_module_name, $breadcrumbs);
            ?>
            {{--<li class="header">LABELS</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        @endif
    @endif
</ul>