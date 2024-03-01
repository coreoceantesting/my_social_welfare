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

                            @can('category-wise-scheme.view')
                            <li class="nav-item">
                                <a href="{{ route('category_wise_scheme.index') }}" class="nav-link" data-key="t-horizontal">Category Wise Schemes</a>
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

                  @canany(['users.applicationList'])

                    @php
                        $categoryId = Auth::user()->category;

                        $schemes_list = DB::table('category_wise_scheme AS t')
                            ->select('t.id', 'm.scheme_name', 'm.scheme_marathi_name', 't.scheme_id', 't.category_id')
                            ->join('mst_scheme as m', 'm.id', '=', 't.scheme_id')
                            ->whereRaw('FIND_IN_SET(?, t.category_id)', [$categoryId])
                            ->get();
                                // dd($schemes_list);
                    @endphp
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Total Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                            @foreach($schemes_list as $list)
                                @php 
                                    $string = $list->scheme_name;
                                    $words = explode(' ', $string);
                                    $words[0] = strtolower($words[0]);
                                    if($words[0] == 'divyang')
                                    {
                                            $url = url($words[0].'_application');
                                    }elseif($words[0] == 'bus'){
                                        $url = url($words[0].'_concession_application');
                                    }else{
                                        $url = url($words[0].'_scheme_application');
                                    }
                                @endphp
                                <li class="nav-item">
                                    <a href="{{ $url }}" class="nav-link" data-key="t-horizontal">{{$list->scheme_name}} List ({{$list->scheme_marathi_name}})</a>
                                </li>
                            @endforeach

                            {{-- <li class="nav-item">
                                <a href="{{ url('bus_concession_application') }}" class="nav-link" data-key="t-horizontal">Bus Concession Scheme Application List (बस सवलत योजना अर्जांची यादी)</a>
                            </li>
                               @if(Auth::user()->category == 1 || Auth::user()->category == 2)
                            <li class="nav-item">
                                <a href="{{ url('divyang_application') }}" class="nav-link" data-key="t-horizontal">Divyang Scheme Application List (दिव्यांग योजना अर्जांची यादी)</a>
                            </li>


                               <li class="nav-item">
                                <a href="{{ url('education_scheme_application') }}" class="nav-link" data-key="t-horizontal">Education Scheme Application List (शिक्षण योजना अर्ज यादी)</a>
                            </li>

                             <li class="nav-item">
                                <a href="{{ url('marriage_scheme_application') }}" class="nav-link" data-key="t-horizontal">Marriage Scheme Application List (विवाह योजना अर्जांची यादी)</a>
                            </li>

                             @endif

                              @if(Auth::user()->category == 4 )

                                <li class="nav-item">
                                <a href="{{ url('education_scheme_application') }}" class="nav-link" data-key="t-horizontal">Education Scheme Application List (शिक्षण योजना अर्ज यादी)</a>
                            </li>

                              <li class="nav-item">
                                <a href="{{ url('cancer_scheme_application') }}" class="nav-link" data-key="t-horizontal">Cancer Scheme Application List(कर्करोग योजना अर्जांची यादी)</a>
                            </li>

                             <li class="nav-item">
                                <a href="{{ url('sports_scheme_application') }}" class="nav-link" data-key="t-horizontal">Sports Scheme Application List(क्रीडा योजना अर्जांची यादी)</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('vehicle_scheme_application') }}" class="nav-link" data-key="t-horizontal">Vehicle Scheme Application List(वाहन योजना अर्ज यादी)</a>
                            </li>

                             <li class="nav-item">
                                <a href="{{ url('women_scheme_application') }}" class="nav-link" data-key="t-horizontal">Women Sewing/Beautisians Scheme Application List(महिला शिवणकाम/ब्युटिशियन योजना अर्ज यादी)</a>
                            </li>

                              @endif --}}

                        </ul>
                    </div>
                </li>

          @endcan

            @php
                $categories = DB::table('category_mst')->where('deleted_at', null)->get();
                $category_wise_scheme = DB::table('category_wise_scheme AS t')
                                            ->select('t.id', DB::raw('GROUP_CONCAT(c.category_name SEPARATOR ",") as category_names'), 'm.scheme_name',  't.scheme_id','t.category_id')
                                            ->join('mst_scheme as m', 'm.id', '=', 't.scheme_id')
                                            ->leftJoin('category_mst as c', function ($join) {
                                                $join->on(DB::raw('FIND_IN_SET(c.id, t.category_id)'), '>', DB::raw('0'));
                                            })
                                            ->groupBy('t.id', 'm.scheme_name','t.scheme_id','t.category_id')
                                            ->get();


                @endphp

                  {{-- HOD Panel --}}
                @canany(['hod.application'])



            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Pending Scheme Application</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                {{ $category->category_name }}
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCalendar">
                                <ul class="nav nav-sm flex-column">
                                    @foreach ($category_wise_scheme as $scheme)

                                        @if (in_array($category->id, explode(',', $scheme->category_id)))



                                        @if(isset($scheme->id))
                                        @if($scheme->id == 1)
                                        <li class="nav-item">
                                            <a href="{{ url('divyang_registration_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        </li>
                                        @elseif($scheme->id == 2)
                                        <li class="nav-item">
                                        @if ($category->id == 1 || $category->id == 2)
                                         <a href="{{ url('bus_concession_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                         @elseif ($category->id == 3)
                                         <a href="{{ url('bus_concession_application_list?category=seniorCitizen', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                         @elseif ($category->id == 4)
                                            <a href="{{ url('bus_concession_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>

                                         @endif
                                        </li>
                                        @elseif($scheme->id == 3)
                                        <li class="nav-item">
                                        @if ($category->id == 1 || $category->id == 2)
                                        <a href="{{ url('education_scheme_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        @elseif ($category->id == 4)
                                        <a href="{{ url('education_scheme_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        @endif
                                      </li>

                                        @elseif($scheme->id == 4)
                                        <li class="nav-item">
                                        <a href="{{ url('marriage_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 5)
                                        <li class="nav-item">
                                        <a href="{{ url('sports_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 6)
                                        <li class="nav-item">
                                        <a href="{{ url('women_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 7)
                                        <li class="nav-item">
                                        <a href="{{ url('cancer_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 8)
                                        <li class="nav-item">
                                        <a href="{{ url('vehicle_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @endif
                                        @endif

                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Approved Scheme Application</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                {{ $category->category_name }}
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCalendar">
                                <ul class="nav nav-sm flex-column">
                                    @foreach ($category_wise_scheme as $scheme)
                                        @if (in_array($category->id, explode(',', $scheme->category_id)))

                                        @if(isset($scheme->id))
                                        @if($scheme->id == 1)
                                        <li class="nav-item">
                                            <a href="{{ url('divyang_registration_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        </li>
                                        @elseif($scheme->id == 2)

                                        @if ($category->id == 1 || $category->id == 2)
                                        <a href="{{ url('bus_concession_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        @elseif ($category->id == 3)
                                        <a href="{{ url('bus_concession_application_list?category=seniorCitizen', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        @elseif ($category->id == 4)
                                           <a href="{{ url('bus_concession_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>

                                        @endif

                                        @elseif($scheme->id == 3)
                                        <li class="nav-item">
                                            @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('education_scheme_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('education_scheme_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                          </li>
                                        @elseif($scheme->id == 4)
                                        <li class="nav-item">
                                        <a href="{{ url('marriage_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 5)
                                        <li class="nav-item">
                                        <a href="{{ url('sports_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 6)
                                        <li class="nav-item">
                                        <a href="{{ url('women_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 7)
                                        <li class="nav-item">
                                        <a href="{{ url('cancer_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @elseif($scheme->id == 8)
                                        <li class="nav-item">
                                        <a href="{{ url('vehicle_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                    </li>
                                        @endif
                                        @endif

                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Rejected Scheme Application</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                {{ $category->category_name }}
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCalendar">
                                <ul class="nav nav-sm flex-column">
                                    @foreach ($category_wise_scheme as $scheme)
                                        @if (in_array($category->id, explode(',', $scheme->category_id)))

                                        @if(isset($scheme->id))
                                        @if($scheme->id == 1)
                                        <li class="nav-item">
                                            <a href="{{ url('divyang_registration_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                        </li>
                                        @elseif($scheme->id == 2)
                                        @if ($category->id == 1 || $category->id == 2)
                                         <a href="{{ url('bus_concession_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                         @elseif ($category->id == 3)
                                         <a href="{{ url('bus_concession_application_list?category=seniorCitizen', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                         @elseif ($category->id == 4)
                                         <a href="{{ url('bus_concession_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>

                                         @endif

                                        @elseif($scheme->id == 3)
                                        <li class="nav-item">
                                            @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('education_scheme_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('education_scheme_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                          </li>
                                        @elseif($scheme->id == 4)
                                        <li class="nav-item">
                                        <a href="{{ url('marriage_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                      </li>
                                        @elseif($scheme->id == 5)
                                        <li class="nav-item">
                                        <a href="{{ url('sports_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                      </li>
                                        @elseif($scheme->id == 6)
                                        <li class="nav-item">
                                        <a href="{{ url('women_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                      </li>
                                        @elseif($scheme->id == 7)
                                        <li class="nav-item">
                                        <a href="{{ url('cancer_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                      </li>
                                        @elseif($scheme->id == 8)
                                        <li class="nav-item">
                                        <a href="{{ url('vehicle_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                      </li>
                                        @endif
                                        @endif

                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>

                @endcan

              {{-- AC Panel --}}
                @canany(['ac.application'])

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Pending Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('ac_divyang_registration_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                            @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('ac_bus_concession_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 3)
                                            <a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('ac_bus_concession_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                          </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('ac_education_scheme_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('ac_education_scheme_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_marriage_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_sports_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_women_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_cancer_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_vehicle_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Approved Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('ac_divyang_registration_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('ac_bus_concession_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('ac_bus_concession_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                              </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('ac_education_scheme_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('ac_education_scheme_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_marriage_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_sports_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_women_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_cancer_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_vehicle_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Rejected Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('ac_divyang_registration_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('ac_bus_concession_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('ac_bus_concession_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                              </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('ac_education_scheme_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('ac_education_scheme_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_marriage_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_sports_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_women_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_cancer_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('ac_vehicle_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                @endcan

                {{-- AMC Panel --}}

                @canany(['amc.application'])

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Pending Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('amc_divyang_registration_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('amc_bus_concession_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 3)
                                            <a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('amc_bus_concession_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                        </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('amc_education_scheme_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('amc_education_scheme_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_marriage_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_sports_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_women_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_cancer_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_vehicle_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Approved Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('amc_divyang_registration_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('amc_bus_concession_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('amc_bus_concession_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                    @endif
                                          </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('amc_education_scheme_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('amc_education_scheme_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                          </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_marriage_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_sports_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_women_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_cancer_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_vehicle_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Rejected Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('amc_divyang_registration_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('amc_bus_concession_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('amc_bus_concession_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                    @endif
                                          </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('amc_education_scheme_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('amc_education_scheme_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                          </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_marriage_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_sports_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_women_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_cancer_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('amc_vehicle_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>




                @endcan

                  {{-- DMC Panel --}}

                @canany(['dmc.application'])

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Pending Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('dmc_divyang_registration_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('dmc_bus_concession_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 3)
                                            <a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('dmc_bus_concession_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('dmc_education_scheme_application_list?category='.$category->id, 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('dmc_education_scheme_application_list?category=women', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_marriage_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_sports_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_women_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_cancer_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_vehicle_scheme_application_list', 0) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Approved Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('dmc_divyang_registration_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('dmc_bus_concession_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('dmc_bus_concession_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                          </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('dmc_education_scheme_application_list?category='.$category->id, 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('dmc_education_scheme_application_list?category=women', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_marriage_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_sports_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_women_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_cancer_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_vehicle_scheme_application_list', 1) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Rejected Scheme Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @foreach ($categories as $category)
                            <li class="nav-item">
                                <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                    {{ $category->category_name }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCalendar">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($category_wise_scheme as $scheme)
                                            @if (in_array($category->id, explode(',', $scheme->category_id)))

                                            @if(isset($scheme->id))
                                            @if($scheme->id == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('dmc_divyang_registration_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            </li>
                                            @elseif($scheme->id == 2)
                                            <li class="nav-item">
                                                @if ($category->id == 1 || $category->id == 2)
                                                <a href="{{ url('dmc_bus_concession_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 3)
                                                <a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @elseif ($category->id == 4)
                                                <a href="{{ url('dmc_bus_concession_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                                @endif
                                          </li>
                                            @elseif($scheme->id == 3)
                                            <li class="nav-item">
                                             @if ($category->id == 1 || $category->id == 2)
                                            <a href="{{ url('dmc_education_scheme_application_list?category='.$category->id, 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @elseif ($category->id == 4)
                                            <a href="{{ url('dmc_education_scheme_application_list?category=women', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                            @endif
                                        </li>
                                            @elseif($scheme->id == 4)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_marriage_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                          </li>
                                            @elseif($scheme->id == 5)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_sports_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 6)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_women_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 7)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_cancer_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @elseif($scheme->id == 8)
                                            <li class="nav-item">
                                            <a href="{{ url('dmc_vehicle_scheme_application_list', 2) }}" class="nav-link" data-key="t-main-calender"> {{ $scheme->scheme_name }}</a>
                                           </li>
                                            @endif
                                            @endif

                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
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

