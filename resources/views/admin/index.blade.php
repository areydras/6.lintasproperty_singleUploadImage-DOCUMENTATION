<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin_template/assets/images/favicon.png">
    <title>Nice admin Template - The Ultimate Multipurpose admin template</title>
    <link href="/admin_template/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/admin_template/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
            <header class="topbar" data-navbarbg="skin6">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header" data-logobg="skin5">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                            <i class="ti-menu ti-close"></i>
                        </a>
                        <div class="navbar-brand">
                            <a href="index.html" class="logo">
                                <b class="logo-icon">
                                    <img src="/admin_template/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                    <img src="/admin_template/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                                </b>
                                <span class="logo-text">
                                    <img src="/admin_template/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <img src="/admin_template/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                                </span>
                            </a>
                        </div>
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                        <ul class="navbar-nav float-left mr-auto">
                            <li class="nav-item search-box">
                                <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-magnify font-20 mr-1"></i>
                                        <div class="ml-1 d-none d-sm-block">
                                            <span>Search</span>
                                        </div>
                                    </div>
                                </a>
                                <form class="app-search position-absolute">
                                    <input type="text" class="form-control" placeholder="Search &amp; enter">
                                    <a class="srh-btn">
                                        <i class="ti-close"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            @can('isAdmin')
                            <li class="sidebar-item">
                                <router-link to="/admin/dashboard" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-av-timer"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </router-link>
                            </li>
                            <li class="sidebar-item">
                                <router-link to="/admin/property" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-city"></i>
                                    <span class="hide-menu">Property</span>
                                </router-link>
                            </li>
                            {{-- <li class="sidebar-item">
                                <router-link to="/admin/client-email" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu">Client Email</span>
                                </router-link>
                            </li> --}}
                            <li class="sidebar-item">
                                <router-link to="/admin/client-message" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-message"></i>
                                    <span class="hide-menu">Client Message</span>
                                </router-link>
                            </li>
                            <li class="sidebar-item">
                                <router-link to="/admin/office" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-deskphone"></i>
                                    <span class="hide-menu">Office</span>
                                </router-link>
                            </li>
                            <li class="sidebar-item">
                                <router-link to="/admin/client-testimonial" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-account-location"></i>
                                    <span class="hide-menu">Client Testimonial</span>
                                </router-link>
                            </li>
                            <li class="sidebar-item">
                                <router-link to="/admin/profile" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-account-network"></i>
                                    <span class="hide-menu">Profile</span>
                                </router-link>
                            </li>
                            @endcan
                            @can('isDeveloper')
                            <li class="sidebar-item">
                                <router-link to="/admin/developer" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                                    <i class="mdi mdi-account-network"></i>
                                    <span class="hide-menu">Developer</span>
                                </router-link>
                            </li>
                            @endcan
                            <li class="sidebar-item">
                                <a href="{{ route('logout') }}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span class="hide-menu">Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                {{-- Vue-Route --}}
                <router-view></router-view>
    
                <footer class="footer text-center">
                    All Rights Reserved by Nice admin. Designed and Developed by
                    <a href="https://wrappixel.com">WrapPixel</a>.
                </footer>
            </div>
        </div>        
    </div>
    <script>
        window.user = @json(auth()->user())
    </script>
    <script src="/js/app.js"></script>
    <script src="/admin_template/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/admin_template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/admin_template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admin_template/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="/admin_template/dist/js/waves.js"></script>
    <script src="/admin_template/dist/js/sidebarmenu.js"></script>
    <script src="/admin_template/dist/js/custom.min.js"></script>
    <script src="/admin_template/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="/admin_template/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/admin_template/dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>