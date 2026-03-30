<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/h1.png') }}" class="img-fluid" alt="" style="width: 15%;" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">User Menu</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass('user.dashboard') }}" href="{{ route('user.dashboard') }}" aria-expanded="false">
                        <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Layanan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('spk.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:globus-outline"></iconify-icon>
                        <span class="hide-menu">Mulai Perhitungan</span>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Informasi</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('media-tanam') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Media Tanam</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('sistem-tanam') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Sistem Tanam</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
