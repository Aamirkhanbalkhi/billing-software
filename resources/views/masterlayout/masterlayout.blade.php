<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" />

    <!-- third party css -->
    <link href="{{url('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <!-- Bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Plugins css -->
    <link href="{{url('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{url('css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{url('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{url('css/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{url('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{url('css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- costom css  -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <!-- <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." id="top-search" />
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown"></div>
                            </div>
                        </form>
                    </li> -->

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" />
                            </form>
                        </div>
                    </li>

                    <!-- All-->

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{url('images/users/user-avatar.png')}}" alt="user-image" class="rounded-circle" />
                            <span class="pro-user-name ml-1">
                                Geneva <!-- <i class="mdi mdi-chevron-down"></i> -->
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{url('myAccount')}}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{url('changepw')}}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Change Password</span>
                            </a>
                            <!-- item-->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <!-- <img src="{{url('images/users/logo.png')}}" alt="logo" height="22" /> -->
                            <span class="logo-lg-text-light">UBold</span>
                        </span>
                        <span class="logo-lg">
                            <!-- <img src="{{url('images/users/logo.png')}}" alt="" height="20" /> -->
                            <span class="logo-lg-text-light">U</span>
                        </span>
                    </a>

                    <a href="#" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{url('images/users/logo-2.png')}}" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img src="{{url('images/users/logo-2.png')}}" alt="" height="30" />
                            <span class="text-white"> Billing-Software</span>
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="h-100" data-simplebar>
                <!-- User box -->
                <!-- <div class="user-box text-center">
                    <a href="{{ url('dashboard')}}">
                        <img src="{{url('images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md" />
                    </a>
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>My Account</span>
                            </a>


                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div> -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title mt-2">CORE</li>
                        <li>
                            <a href="{{ url('dashboard') }}">
                                <i class="dripicons-meter"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                        </li>
                        <li class="menu-title mt-2">INVENTORY</li>
                        <li>
                            <a href="#sidebarEcommerce" data-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Parties </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{url('add-new-client')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Add New</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ManageParties')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage
                                            Parties</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#sidebarCrm" data-toggle="collapse">
                                <i class="fas fa-rupee-sign"></i>
                                <span> GST Billing </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCrm">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{url('CreateBill')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Create
                                            bill</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ManageGST')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage all
                                            bills</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                        <li>
                            <a href="{{url('InvoiceList')}}"><i data-feather="list" class="pr-0 mr-1"></i>
                                <span> Vendor Invoice </span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- Custom js  -->
    <script src="{{url('js/script.js')}}"></script>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay')}}"></div>

    <!-- Vendor js -->
    <script src="{{url('js/vendor.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{url('libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{url('libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{url('js/pages/dashboard-1.init.js')}}"></script>
    <!-- Datatables init -->
    <script src="{{url('js/pages/datatables.init.js')}}"></script>

    <!-- App js-->
    <script src="{{url('js/app.min.js')}}"></script>

    <!-- third party js -->'
    <script src="{{url('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <!-- third party js ends -->

    <!-- Bootstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>