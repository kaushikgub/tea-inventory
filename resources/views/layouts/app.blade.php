<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Best B Bangladesh</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
          type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <h2 class="font-weight-bolder">
                    <span style="color: #08c8e9">BEST </span>
                    <span style="color: #1db33f">B </span>
                    <span style="color: #08c8e9">Bangladesh</span>
                </h2>
                {{--                <img src="{{ asset('/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">--}}
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/brands') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Brands</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/inventories') }}">
                            <i class="ni ni-money-coins text-primary"></i>
                            <span class="nav-link-text">Inventory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/sales') }}">
                            <i class="ni ni-delivery-fast"></i>
                            <span class="nav-link-text">Sale</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('/assets/img/theme/team-1.jpg') }}">
                  </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            {{--                            <div class="dropdown-header noti-title">--}}
                            {{--                                <h6 class="text-overflow m-0">Welcome!</h6>--}}
                            {{--                            </div>--}}
                            {{--                            <a href="#!" class="dropdown-item">--}}
                            {{--                                <i class="ni ni-single-02"></i>--}}
                            {{--                                <span>My profile</span>--}}
                            {{--                            </a>--}}
                            {{--                            <a href="#!" class="dropdown-item">--}}
                            {{--                                <i class="ni ni-settings-gear-65"></i>--}}
                            {{--                                <span>Settings</span>--}}
                            {{--                            </a>--}}
                            {{--                            <a href="#!" class="dropdown-item">--}}
                            {{--                                <i class="ni ni-calendar-grid-58"></i>--}}
                            {{--                                <span>Activity</span>--}}
                            {{--                            </a>--}}
                            {{--                            <a href="#!" class="dropdown-item">--}}
                            {{--                                <i class="ni ni-support-16"></i>--}}
                            {{--                                <span>Support</span>--}}
                            {{--                            </a>--}}
                            {{--                            <div class="dropdown-divider"></div>--}}
                            <a href="{{ url('/logout') }}" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container-fluid mt-4">
        @yield('content')
    </section>
    <div class="modal fade" id="confirmPopup" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <form id="action_url" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('/assets/js/argon.js?v=1.2.0') }}"></script>
<script>
    $(document).on('click', '#delete', function () {
        const URL = $(this).data('url');
        console.log(URL);
        $('#action_url').prop('action', URL);
        $('#confirmPopup').modal('show');
    })
</script>
</body>

</html>
