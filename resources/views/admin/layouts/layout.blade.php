<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DCC ERP|Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- base:css -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- plugin css for this paglink rel="stylesheet" href=" -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}')}}" />

    <script src="{{ asset('admin/js/add/addContacts.js') }}"></script>

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav navbar-nav-left">
                            <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                                <a href="#" class="nav-link horizontal-nav-left-menu"><i
                                        class="mdi mdi-format-list-bulleted"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-bell mx-0"></i>
                                    <span class="count bg-success">2</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="notificationDropdown">
                                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning">
                                                <i class="mdi mdi-settings mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Private message
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-info">
                                                <i class="mdi mdi-account-box mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                2 days ago
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-email mx-0"></i>
                                    <span class="count bg-primary">4</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="messageDropdown">
                                    <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="{{ asset('admin/images/faces/face4.jpg') }}" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                            </h6>
                                            <p class="font-weight-light small-text text-muted mb-0">
                                                The meeting is cancelled
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="{{ asset('admin/images/faces/face2.jpg') }}" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                            </h6>
                                            <p class="font-weight-light small-text text-muted mb-0">
                                                New product launch
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="{{ asset('admin/images/faces/face3.jpg') }}" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                            </h6>
                                            <p class="font-weight-light small-text text-muted mb-0">
                                                Upcoming board meeting
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link count-indicator "><i
                                        class="mdi mdi-message-reply-text"></i></a>
                            </li>
                        </ul>
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="/control"><img
                                    src="{{ asset('admin/images/logo.svg') }}" alt="logo" /></a>
                            <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                    src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" /></a>
                        </div>
                        <ul class="navbar-nav navbar-nav-right">

                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                    <span class="online-status"></span>
                                    <img src="{{ asset('admin/images/faces/face28.png') }}" alt="profile" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="profileDropdown">
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        <i class="mdi mdi-logout text-primary"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    {{-- <a class="dropdown-item">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Logout
                                    </a> --}}
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Main</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('levels.index') }}">Levels</a>
                                    </li> --}}
                                    {{-- <li><a class="nav-link"
                                            href="{{ route('subscriptions.index') }}">Subscriptions</a>
                                    </li> --}}
                                    <li><a class="nav-link" href="{{ route('companies.index') }}">Companies</a></li>

                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-cube-outline menu-icon"></i>
                        <span class="menu-title">UI Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul>
                            <li class="nav-item"><a class="nav-link"
                                    href="pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="pages/forms/basic_elements.html" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Form Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/chartjs.html" class="nav-link">
                        <i class="mdi mdi-finance menu-icon"></i>
                        <span class="menu-title">Charts</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/tables/basic-table.html" class="nav-link">
                        <i class="mdi mdi-grid menu-icon"></i>
                        <span class="menu-title">Tables</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/icons/mdi.html" class="nav-link">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-codepen menu-icon"></i>
                        <span class="menu-title">Sample Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login
                                    2</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register
                                    2</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="pages/samples/lock-screen.html">Lockscreen</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="docs/documentation.html" class="nav-link">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Documentation</span></a>
                </li> --}}
                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-wrap">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                    href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com
                                </a>2021</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                                templates</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('admin/vendors/justgage/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/justgage/justgage.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>

    <!-- container-scroller -->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('admin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script src="{{ asset('admin/js/typeahead.js') }}"></script>
    <script src="{{ asset('admin/js/select2.js') }}"></script>
    <script src="{{ asset('admin/js/open/levels.js') }}"></script>
    <script src="{{ asset('admin/js/add/addContacts.js') }}"></script>
    <script src="{{ asset('admin/js/tabs/tabs.js') }}"></script>
    <!-- End custom js for this page-->
</body>
</body>

</html>
