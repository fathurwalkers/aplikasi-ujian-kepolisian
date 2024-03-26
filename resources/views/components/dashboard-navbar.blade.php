<div>
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('assets') }}/logo-trc.jpeg">
            </div>
            <div class="sidebar-brand-text mx-3">TRC BAUBAU</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beranda</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
                aria-expanded="true" aria-controls="collapseBootstrap1">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Data</h6>
                    <a class="collapse-item" href="{{ route('data-peserta') }}">Master Peserta</a>
                    <a class="collapse-item" href="{{ route('data-petugas') }}">Master Petugas</a>
                    <a class="collapse-item" href="{{ route('data-ukom') }}">Master UKOM</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('bank-soal') }}">
                <i class="fas fa-fw fa-palette"></i>
                <span>Bank Soal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                aria-expanded="true" aria-controls="collapseForm">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Uji Kompetensi</span>
            </a>
            <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen UKOM</h6>
                    <a class="collapse-item" href="{{ route('jadwal-ujian') }}">Uji Kompetensi</a>
                    <a class="collapse-item" href="{{ route('hasil-ujian') }}">Hasil Ujian</a>
                </div>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2"
                aria-expanded="true" aria-controls="collapseTable2">
                <i class="fas fa-fw fa-table"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseTable2" class="collapse" aria-labelledby="headingTable"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Laporan</h6>
                    <a class="collapse-item" href="simple-tables.html">Jadwal Ujian</a>
                    <a class="collapse-item" href="datatables.html">Hasil Ujian</a>
                </div>
            </div>
        </li> --}}
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            MORE
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable3"
                aria-expanded="true" aria-controls="collapseTable3">
                <i class="fas fa-fw fa-table"></i>
                <span>User Management</span>
            </a>
            <div id="collapseTable3" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Management</h6>
                    {{-- <a class="collapse-item" href="simple-tables.html">Administrator</a> --}}
                    <a class="collapse-item" href="{{ route('data-akun') }}">User Akun</a>
                </div>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable4"
                aria-expanded="true" aria-controls="collapseTable4">
                <i class="fas fa-fw fa-table"></i>
                <span>Settings</span>
            </a>
            <div id="collapseTable4" class="collapse" aria-labelledby="headingTable"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Settings</h6>
                    <a class="collapse-item" href="simple-tables.html">Administrator</a>
                    <a class="collapse-item" href="datatables.html">User Akun</a>
                </div>
            </div>
        </li> --}}
        {{-- <div class="version" id="version-ruangadmin"></div> --}}
    </ul>
</div>
