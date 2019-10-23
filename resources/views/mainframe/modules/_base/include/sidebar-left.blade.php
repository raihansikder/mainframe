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
                $current_module_name = $module->name;
                $breadcrumbs         = breadcrumb($currentModule);
            }
            renderMenuTree(\App\ModuleGroup::tree(), $current_module_name, $breadcrumbs);
            ?>
            <li>
                <a href="{{route('invoices.report-bankline-export')}}?submit=Run&report_name=Bank%20Line%20Export&rows_per_page=10&invoice_currency=GBP&beneficiary_type=charity&is_test=0">
                    <i class="fa fa-download"></i>Bankline Export</a>
            </li>
            <li>
                <a href="{{route('bulk-resend')}}">
                    <i class="fa fa-envelope"></i>Resend Verification Email</a>
            </li>
            {{--<li class="header">LABELS</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        @else
            {{--if user belongs to a partner/brand--}}
            @if(user()->ofPartner())
                <li><a href="{{route('partners.show', user()->partner_id)}}"><i class="fa
                fa-info-circle"></i>Image upload</a></li>
                {{--<li><a href="{{route('partners.integration')}}"><i class="fa fa-code"></i>Integration</a></li>--}}
                <?php
                $moduleNames = [
                    //'recommendurls',
                    'purchases',
                    //'beacons',
                    //'users',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach
            @endif

            {{--if user belongs to a charity--}}
            @if(user()->ofCharity())
                <li><a href="{{route('charities.show', user()->charity_id)}}"><i class="fa
                fa-info-circle"></i>Image upload</a></li>
                <?php
                $moduleNames = [
                    'purchases',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach
            @endif

            {{--if user is first line support--}}
            @if(user()->isFirstLineSupport())
                <?php
                $moduleNames = [
                    'purchases',
                    'partners',
                    'charities',
                    'beacons',
                    'users',
                    'recommendurls',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach

            @endif
            {{--if user is lb accounts--}}
            @if(user()->isLBAccounts())
                <?php
                $moduleNames = [
                    'purchases',
                    'invoices',
                    'transactions',
                    'conversionrates',
                    'reports',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach

            @endif
            {{--if user is lb read only usert--}}
            @if(user()->isLBReadOnlyUser())
                <?php
                $moduleNames = [
                    'beacons',
                    'purchases',
                    'partners',
                    'charities',
                    'users',
                    'recommendurls',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach

            @endif
            {{--if user is lb admin user--}}
            @if(user()->isLBAdminUser())
                <?php
                $moduleNames = [
                    'purchases',
                    'partners',
                    'charities',
                    'users',
                    'recommendurls',
                    'reports'
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach
            @endif
            {{--if user is lb daily task user--}}
            @if(user()->isLBDailyTaskUser())
                <?php
                $moduleNames = [
                    'partners',
                    'purchases',
                    'recommendurls',
                    'firebaseentries',
                    'flurryapptimes',
                    'flurrybrandtimes',
                    'recommendationvisits',
                    'affiliatepurchases',
                    'dataimports',
                    'reports',
                    'users',
                ];
                ?>

                @foreach($moduleNames as $name)
                    <?php
                    /** @var \App\Module $module */
                    $module = \App\Module::where('name', $name)->remember(cacheTime('long'))->first()?>
                    <li><a href="{{route("{$module->name}.index")}}"><i
                                    class="{{$module->icon_css}}"></i>{{$module->title}}</a></li>
                @endforeach
            @endif
        @endif
    @endif
</ul>