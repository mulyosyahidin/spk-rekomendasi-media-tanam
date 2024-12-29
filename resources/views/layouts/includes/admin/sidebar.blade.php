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
                    <span class="hide-menu">Admin</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass('admin.dashboard') }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">DATA MASTER</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass(['admin.kriteria.*', 'admin.sub-kriteria.*']) }}" href="{{ route('admin.kriteria.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Kriteria</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass(['admin.alternatif.*', 'admin.sistem-tanam.*', 'admin.media-tanam.*']) }}" href="{{ route('admin.alternatif.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Alternatif</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass('admin.tanaman.*') }}" href="{{ route('admin.tanaman.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Tanaman</span>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">DATA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass('admin.karakteristik-tanaman.*') }}" href="{{ route('admin.karakteristik-tanaman.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">Karakteristik Tanaman</span>
                    </a>
                </li>

                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Perhitungan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ activeClass('admin.perhitungan.*') }}" href="{{ route('admin.perhitungan.index') }}" aria-expanded="false">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                        <span class="hide-menu">SPK MOORA</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
