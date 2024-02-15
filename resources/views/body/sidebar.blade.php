<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user me-1"></i>
                    <span>My Account</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings me-1"></i>
                    <span>Settings</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock me-1"></i>
                    <span>Lock Screen</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out me-1"></i>
                    <span>Logout</span>
                    </a>
                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="@if(auth()->user()->type == "super_admin") {{ route('admin.dashboard') }} @elseif(auth()->user()->type == "marketing") {{ route('marketing.dashboard') }} @endif">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Manager</li>
                <li>
                    <a href="@if(auth()->user()->type == "super_admin") {{ route('admin.dashboard.calendar') }} @elseif(auth()->user()->type == "marketing") {{ route('marketing.dashboard.calendar') }} @endif">
                        <i class="mdi mdi-calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li>
                @if (auth()->user()->type == "super_admin")
                    <li>
                        <a href="#marketing" data-bs-toggle="collapse">
                            <i class="mdi mdi-account-tie-voice"></i>
                            <span> Marketing </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="marketing">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.marketing.dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.marketing.dashboard.list') }}">Marketing Accounts</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i class="mdi mdi-storefront-outline"></i>
                            <span> Merchant </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.merchant.list') }}">Merchant List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#finance" data-bs-toggle="collapse">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span> Finance </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="finance">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.finance.data') }}">Penghasilan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif (auth()->user()->type == "marketing")
                    <li>
                        <a href="#marketing" data-bs-toggle="collapse">
                            <i class="mdi mdi-qrcode-scan"></i>
                            <span> Invitation Code </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="marketing">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('marketing.dashboard.invitation_code.list') }}">Invitation Code List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i class="mdi mdi-storefront-outline"></i>
                            <span> Merchant </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('marketing.dashboard.merchant.list') }}">Merchant List</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.merchant.list') }}">Data Penarikan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#financeMarketing" data-bs-toggle="collapse">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span> Finance </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="financeMarketing">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.merchant.list') }}">Penghasilan</a>
                                </li>
                            </ul>
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.merchant.list') }}">Penarikan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
