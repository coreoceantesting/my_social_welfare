<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>


              @if(Auth::user()->category == 1 || Auth::user()->category == 2)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('hayatichaDakhlaform.index') }}">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Hayati Form</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('uploaded-document') }}">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Uploaded Live Certificate</span>
                    </a>
                </li>
                @endif

                @canany(['hod.status'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Divyang Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ url('divyang_registration_list', 0) }}" class="nav-link" data-key="t-horizontal">Pending</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('divyang_registration_list', 1) }}" class="nav-link" data-key="t-horizontal">Approved</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('divyang_registration_list', 2) }}" class="nav-link" data-key="t-horizontal">Rejected</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Bus Concession Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ url('bus_concession_application_list', 0) }}" class="nav-link" data-key="t-horizontal">Pending</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('bus_concession_application_list', 1) }}" class="nav-link" data-key="t-horizontal">Approved</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('bus_concession_application_list', 2) }}" class="nav-link" data-key="t-horizontal">Rejected</a>
                            </li>

                        </ul>
                    </div>
                </li>


                @endcan




                @canany(['wards.view', 'category.view', 'scheme.view', 'document-type.view', 'financial-year.view', 'terms-conditions.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                @can('wards.view')
                                <a href="{{ route('wards.index') }}" class="nav-link" data-key="t-horizontal">Wards</a>
                                @endcan
                            </li>

                            @can('category.view')
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link" data-key="t-horizontal">Categories</a>
                            </li>
                            @endcan

                            @can('scheme.view')
                            <li class="nav-item">
                                <a href="{{ route('scheme.index') }}" class="nav-link" data-key="t-horizontal">Schemes</a>
                            </li>
                            @endcan

                            @can('document-type.view')
                            <li class="nav-item">
                                <a href="{{ route('document.index') }}" class="nav-link" data-key="t-horizontal">Document Type</a>
                            </li>
                            @endcan

                            @can('financial-year.view')
                            <li class="nav-item">
                                <a href="{{ route('financial.index') }}" class="nav-link" data-key="t-horizontal">Financial Year</a>
                            </li>
                            @endcan

                            @can('terms-conditions.view')
                            <li class="nav-item">
                                <a href="{{ route('terms-conditions.index') }}" class="nav-link" data-key="t-horizontal">Terms And Conditions</a>
                            </li>
                            @endcan

                        </ul>
                    </div>
                </li>
                @endcan

                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
