<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">Pesona Kahuripan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Hubungi Pembeli -->
            @role('marketing')
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-phone"></i>
                    <span>Hubungi Pembeli</span>
                </a>
            </li>
            <!-- Nav Item - Site Plan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site_plans.index') }}">
                    <i class="fa fa-map"></i>
                    <span>Site Plan</span>
                </a>
            </li>

            <!-- Nav Item - Booking Rumah -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bookings.index') }}">
                    <i class="fa fa-book"></i>
                    <span>Booking Rumah</span>
                </a>
            </li>
            @endrole

            <!-- Nav Item - Kelola Pemesanan Collapse Menu -->
            @role('admin')
            <!-- Nav Item - Hubungi Pembeli -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('buyers.index') }}">
                    <i class="fa fa-phone"></i>
                    <span>Hubungi Pembeli</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Kelola Pemesanan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('site_plans.index') }}">Site Plan</a>
                        <a class="collapse-item" href="{{ route('bookings.index') }}">Booking Rumah</a>
                        <a class="collapse-item" href="{{ route('bookings-letter.index') }}">Surat Pemesanan Rumah</a> {{-- Surat Pemesanan Rumah --}}
                </div>
            </li>
            @endrole

            <!-- Nav Item - Kelola Keuangan Collapse Menu -->
            @role('admin|manajer')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-credit-card"></i>
                    <span>Kelola Keuangan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('report-sales.index') }}">Laporan Penjualan</a>
                        </div>
                </div>
            </li>
            @endrole

            <!-- Nav Item - Kelola Perumahan Collapse Menu -->
            @role('admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-home"></i>
                    <span>Kelola Data Perumahan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('properties.index') }}">Data Unit Rumah</a>
                        <a class="collapse-item" href="{{ route('archives.index') }}">Arsip</a>
                        <a class="collapse-item" href="{{ route('notaries.index') }}">Kelola Notaris</a>
                        <a class="collapse-item" href="{{ route('banks.index') }}">Kelola Bank</a>
                        <a class="collapse-item" href="{{ route('users.index') }}">Kelola Pengguna</a>
                    </div>
                </div>
            </li>
            @endrole

            <!-- Nav Item - Kelola Notaris Collapse Menu -->
            @role('manajer')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notaries.index') }}">
                    <i class="fa fa-file-signature"></i>
                    <span>Kelola Notaris</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('banks.index') }}">
                    <i class="fa fa-university"></i>
                    <span>Kelola Bank</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>
            @endrole

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
