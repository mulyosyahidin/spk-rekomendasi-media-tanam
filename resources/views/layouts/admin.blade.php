<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/images/h1.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/themes/matdash/css/styles.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}">

    <style>
        .v-middle {
            vertical-align: middle !important;
            text-align: center;
        }
    </style>

    @yield('custom_head')
    @vite(['resources/js/app.js'])
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    @include('layouts.includes.admin.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{ auth()->user()->profile_picture_url }}" alt="" width="35" height="35"
                                     class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                 aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">Profil</p>
                                    </a>
                                    <a href="#" class="d-flex align-items-center gap-2 dropdown-item logout-link">
                                        <i class="ti ti-logout fs-6"></i>
                                        <p class="mb-0 fs-3">Keluar</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--  Header End -->
        <div class="body-wrapper-inner">
            <div class="container-fluid mw-100">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<form action="{{ route('logout') }}" method="post" id="logout-form">
    @csrf
</form>

@yield('custom_html')

<script src="{{ asset('assets/themes/matdash/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/themes/matdash/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/themes/matdash/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/themes/matdash/js/app.min.js') }}"></script>
<script src="{{ asset('assets/themes/matdash/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/themes/matdash/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

@stack('custom_js')

@if (session()->has('success'))
    <script>
        Swal.fire(
            'Berhasil!',
            `{{ session()->get('success') }}`,
            'success'
        );
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire(
            'Oops...',
            "{{ session()->get('error') }}",
            'error'
        );
    </script>
@endif

<script>
    let logoutLink = document.querySelector('.logout-link');
    if (logoutLink) {
        logoutLink.addEventListener('click', function (e) {
            e.preventDefault();

            document.getElementById('logout-form').submit();
        });
    }
</script>

<script>
    $(document).ready(function () {
        $('.dt-data').DataTable();
    });
</script>

<script>
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>

</body>
</html>
