<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="_token" content="{{csrf_token()}}">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- Icon -->
    <link rel="icon" href="{{ url('assets/img/BRO_LOGO.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{url('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{url('admin/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/segment.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/animate.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/components.css')}}">

    <link rel="stylesheet" href="{{url('admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('admin/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{url('admin/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1"> Hi, Administrator
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profil" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{url('admin/logout')}}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/admin"></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{url('admin/')}}">EDC</a>
                    </div>
                    <ul class="sidebar-menu">
                        @include('admin.themes.menu')
                </aside>
            </div>

            @yield('main-content')

            <footer class="main-footer">
                <div class="footer-right">
                    Copyright &copy; 2020 {{config('app.name') }}
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{url('admin/js/popper.min.js')}}"></script>
    <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{url('admin/js/jQuery/jquery.nicescroll.min.js')}}"></script>
    <script src="{{url('admin/js/moment.min.js')}}"></script>
    <script src="{{url('admin/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{url('admin/js/jQuery/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('admin/js/segment.js')}}"></script>
    <script src="{{url('admin/js/bootstrap-notify.min.js')}}"></script>
    <script src="{{url('admin/js/sweetalert.min.js')}}"></script>
    <script src="{{url('admin/select2/js/select2.full.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        // var APP_URL = {!! json_encode(url('/')) !!}
    </script>

    <!-- Template JS File -->
    <script src="{{url('admin/js/scripts.js')}}"></script>
    <script src="{{url('admin/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    @yield('specificJS')
</body>

</html>