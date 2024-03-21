<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <img src="{{ asset('images/Opticom Logo.png') }}" alt="Brand Logo" class="img-fluid" width="90px"
                height="90px">
            <span class="app-brand-text demo menu-text fw-bold">{{ env('APP_NAME') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active open' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->hasPermissionTo('view_supervisor'))
            <li class="menu-item {{ request()->routeIs('supervisor') ? 'active open' : '' }}">
                <a href="{{ route('supervisor') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-crown"></i>
                    <div data-i18n="Supervisor’s">Supervisor’s</div>

                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view_personnel_present'))
            <li class="menu-item {{ request()->routeIs('personnel') ? 'active open' : '' }}">
                <a href="{{ route('personnel') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Personnel">Personnel</div>

                </a>
            </li>
        @endif
        @if (auth()->user()->hasPermissionTo('view_first_responder'))
            <li class="menu-item {{ request()->routeIs('first-responder') ? 'active open' : '' }}">
                <a href="{{ route('first-responder') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-plus"></i>
                    <div data-i18n="First Responder">First Responder</div>
                </a>
            </li>
        @endif
        <!-- Tasks -->
        @if (auth()->user()->hasPermissionTo('view_sor'))
            <li
                class="menu-item {{ request()->routeIs(['sor', 'hazards', 'improvements', 'goodpractises', 'badpractises']) ? 'active open' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                    <div data-i18n="Safety Observation Records (SOR's)">Safety Observation Records (SOR's)</div>
                </a>

                <ul class="menu-sub">
                    @if (auth()->user()->hasPermissionTo('add_sor'))
                        <li class="menu-item {{ request()->routeIs('sor') ? 'active' : '' }}">
                            <a href="{{ route('sor') }}" class="menu-link">
                                <div data-i18n="Add Record">Add Record</div>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item {{ request()->routeIs('sor.open-sors') ? 'active' : '' }}">
                        <a href="{{ route('sor.open-sors') }}" class="menu-link">
                            <div data-i18n="Open SOR's">Open SOR's</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('hazards') ? 'active' : '' }}">
                        <a href="{{ route('hazards') }}" class="menu-link">
                            <div data-i18n="Reported Hazards">Reported Hazards</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('improvements') ? 'active' : '' }}">
                        <a href="{{ route('improvements') }}" class="menu-link">
                            <div data-i18n="Suggested Improvements">Suggested Improvements</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('goodpractises') ? 'active' : '' }}">
                        <a href="{{ route('goodpractises') }}" class="menu-link">
                            <div data-i18n="Good Practises">Good Practises</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('badpractises') ? 'active' : '' }}">
                        <a href="{{ route('badpractises') }}" class="menu-link">
                            <div data-i18n="Bad Practises">Bad Practises</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!-- Incidents -->
        @if (auth()->user()->hasPermissionTo('view_incident'))

            <li
                class="menu-item {{ request()->routeIs(['incidents', 'nearmiss', 'medicaltreatedcase', 'losttimeaccidents', 'firstaidcase', 'sif']) ? 'active open' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Incident Manager">Incident Manager</div>
                </a>

                <ul class="menu-sub">
                    @if (auth()->user()->hasPermissionTo('add_incident'))
                        <li class="menu-item {{ request()->routeIs('incidents') ? 'active open' : '' }}">
                            <a href="{{ route('incidents') }}" class="menu-link">
                                <div data-i18n="Add Incident">Add Incident</div>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item {{ request()->routeIs('open-incidents') ? 'active open' : '' }}">
                        <a href="{{ route('open-incidents') }}" class="menu-link">
                            <div data-i18n="Open Incidents">Open Incidents</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('nearmiss') ? 'active open' : '' }}">
                        <a href="{{ route('nearmiss') }}" class="menu-link">
                            <div data-i18n="Near Miss">Near Miss</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('firstaidcase') ? 'active open' : '' }}">
                        <a href="{{ route('firstaidcase') }}" class="menu-link">
                            <div data-i18n="First Aid Case">First Aid Case</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('medicaltreatedcase') ? 'active open' : '' }}">
                        <a href="{{ route('medicaltreatedcase') }}" class="menu-link">
                            <div data-i18n="Medical Treated Case">Medical Treated Case</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('losttimeaccidents') ? 'active open' : '' }}">
                        <a href="{{ route('losttimeaccidents') }}" class="menu-link">
                            <div data-i18n="Lost Time Accidents">Lost Time Accidents</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('sif') ? 'active open' : '' }}">
                        <a href="{{ route('sif') }}" class="menu-link">
                            <div data-i18n="SIF (SIF-p / SIF -a)">SIF (SIF-p / SIF -a)</div>
                        </a>
                    </li>

                </ul>
            </li>
        @endif
        <!-- Deviations -->
        @if (auth()->user()->hasPermissionTo('view_icas'))
            <li class="menu-item {{ request()->routeIs(['icas', 'icas.create']) ? 'active open' : '' }}">
                <a href="#" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                    <div data-i18n="Immediate Corrective Actions (ICA)">Immediate Corrective Actions (ICA)</div>
                </a>

                <ul class="menu-sub">
                    @if (auth()->user()->hasPermissionTo('add_icas'))
                        <li class="menu-item {{ request()->routeIs('icas.create') ? 'active open' : '' }}">
                            <a href="{{ route('icas.create') }}" class="menu-link">
                                <div data-i18n="Add ICA's">Add ICA's</div>
                            </a>
                        </li>
                    @endif

                    <li class="menu-item {{ request()->routeIs('icas') ? 'active open' : '' }}">
                        <a href="{{ route('icas') }}" class="menu-link">
                            <div data-i18n="View ICA's">View ICA's</div>
                        </a>
                    </li>

                </ul>
            </li>
        @endif
        <!-- Time and Attendance -->
        <li class="menu-item {{ request()->routeIs('permits') ? 'active open' : '' }}">
            <a href="{{ route('permits') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-checklist"></i>
                <div data-i18n=" Permits Applicable"> Permits Applicable</div>
            </a>
        </li>
        @if (auth()->user()->hasPermissionTo('view_tasks'))
            <li class="menu-item {{ request()->routeIs('user-tasks') ? 'active open' : '' }}">
                <a href="{{ route('user-tasks') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-list"></i>
                    <div data-i18n="Tasks">Tasks</div>
                </a>
            </li>
        @endif
        <li class="menu-item  {{ request()->routeIs('environment') ? 'active open' : '' }}">
            <a href="{{ route('environment') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-tree"></i>
                <div data-i18n="Environment Concerns">Environment Concerns</div>
            </a>
        </li>
        <!-- Apps & Pages -->
        @if (auth()->user()->hasPermissionTo('view_users'))
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Management</span>
            </li>
            <li class="menu-item {{ request()->routeIs('userslist') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('userslist') ? 'active open' : '' }}">
                        <a href="{{ route('userslist') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- <li class="menu-item {{ request()->routeIs('contractors') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Contractors">Contractors</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('userslist') ? 'active open' : '' }}">
                    <a href="{{ route('userslist') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>

            </ul>
        </li> --}}
        @if (auth()->user()->hasPermissionTo('view_roles'))
            <li
                class="menu-item {{ request()->routeIs('roles') || request()->routeIs('permissions') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Roles &amp; Permissions">Roles &amp; Permissions</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('roles') ? 'active open' : '' }}">
                        <a href="{{ route('roles') }}" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('permissions') ? 'active open' : '' }}">
                        <a href="{{ route('permissions') }}" class="menu-link">
                            <div data-i18n="Permission">Permission</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Misc</span>
        </li>
        <li class="menu-item {{ request()->routeIs('faqs') ? 'active open' : '' }}">
            <a href="{{ route('faqs') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="FAQs">FAQs</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('help') ? 'active open' : '' }}">
            <a href="{{ route('help') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Help Center">Help Center</div>
            </a>
        </li>


        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </ul>
</aside>
