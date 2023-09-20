<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0"></path>
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616"></path>
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0"></path>
                </svg>
            </span>
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

        <!-- Tasks -->
        <li
            class="menu-item {{ request()->routeIs(['sor', 'hazards', 'improvements', 'goodpractises', 'badpractises']) ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                <div data-i18n="Safety Observation records (SOR's)">Safety Observation records (SOR's)</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('sor') ? 'active' : '' }}">
                    <a href="{{ route('sor') }}" class="menu-link">
                        <div data-i18n="Add Record">Add Record</div>
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

        <!-- Incidents -->
        <li
            class="menu-item {{ request()->routeIs(['incidents', 'nearmiss', 'medicaltreatedcase', 'losttimeaccidents', 'firstaidcase', 'sif']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Incident Manager">Incident Manager</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('incidents') ? 'active open' : '' }}">
                    <a href="{{ route('incidents') }}" class="menu-link">
                        <div data-i18n="Add Incident">Add Incident</div>
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

        <!-- Deviations -->
        <li class="menu-item {{ request()->routeIs(['icas', 'icas.create']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Immediate collective Actions (ICA)">Immediate collective Actions (ICA)</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('icas.create') ? 'active open' : '' }}">
                    <a href="{{ route('icas.create') }}" class="menu-link">
                        <div data-i18n="Add ICA's">Add ICA's</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('icas') ? 'active open' : '' }}">
                    <a href="{{ route('icas') }}" class="menu-link">
                        <div data-i18n="View ICA's">View ICA's</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Time and Attendance -->
        <li class="menu-item {{ request()->routeIs('sfa') ? 'active open' : '' }}">
            <a href="{{ route('sfa') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-components"></i>
                <div data-i18n=" Permits Applicable"> Permits Applicable</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sfa') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-trash"></i>
                <div data-i18n="Waste Management">Waste Management</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sfa') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-tree"></i>
                <div data-i18n="Environment Concerns">Environment Concerns</div>
            </a>
        </li>

        <!-- Apps & Pages -->
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
