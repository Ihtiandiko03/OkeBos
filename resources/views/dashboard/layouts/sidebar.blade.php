{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Pengguna</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/profil">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Ubah Profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/pengiriman">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Pengirimanku
            </a>
          </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Administrator</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin">
              <span data-feather="grid" class="align-text-bottom"></span>
              Menu Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/agen">
              <span data-feather="grid" class="align-text-bottom"></span>
              Agen
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/driver">
              <span data-feather="grid" class="align-text-bottom"></span>
              Kurir
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/admin/pengiriman">
              <span data-feather="grid" class="align-text-bottom"></span>
              Pengiriman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/rute">
              <span data-feather="grid" class="align-text-bottom"></span>
              Rute
            </a>
          </li>
        </ul>
        @endcan

        
        @can('kurir')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Kurir</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/kurir">
              <span data-feather="grid" class="align-text-bottom"></span>
              Pemesanan
            </a>
          </li>
        </ul>
        @endcan

        @can('agen')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Agen</span> </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="/dashboard/agen">
              <span data-feather="grid" class="align-text-bottom"></span>
              Verifikasi Pengiriman Barang
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="/dashboard/agen/kuriragen">
              <span data-feather="grid" class="align-text-bottom"></span>
              Kurir Agen
            </a>
          </li>
        </ul>
        @endcan


      </div>
    </nav> --}}

    <div class="sidebar">
    <div class="sidebar-brand">
        <h2>
            <span class="lab la-accusoft"></span> <span><a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a></span>
        </h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="/dashboard" class="active"
                    ><span class="las la-igloo"></span>
                    <span>Dashboard</span></a
                >
            </li>
            <li>
                <a href="/dashboard/profil"
                    ><span class="las la-users"></span>
                    <span>Profil</span></a
                >
            </li>
            <li>
                <a href="/dashboard/pengiriman"
                    ><span class="las la-users"></span>
                    <span>Pengiriman</span></a
                >
            </li>
            <li>
                <a href="saldo.html"
                    ><span class="las la-users"></span>
                    <span>Saldo</span></a
                >
            </li>
        
            @can('admin')
                
            
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1"> <span>Administrator</span> </h6>
            
            <li>
                <a href="/dashboard/admin/pengiriman"
                    ><span class="las la-clipboard-list"></span>
                    <span>List Pengiriman</span></a
                >
            </li>

            <li>
                <a href="" class="sub-btn"
                    ><span class="las la-clipboard-list"></span>
                    <span>Daftar Akun</span></a
                >
                <div class="sub-menu">
                    <ul>
                        <li>
                            <a href="/dashboard/admin/agen" class="sub-item"
                                >Akun Agen</a
                            >
                        </li>
                        <li>
                            <a href="/dashboard/admin/driver" class="sub-item"
                                >Akun Kurir</a
                            >
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="/dashboard/rute"
                    ><span class="las la-receipt"></span>
                    <span>Rute</span></a
                >
            </li>
            @endcan
            {{-- <li>
                <a href="laporan.html"
                    ><span class="las la-user-circle"></span>
                    <span>Laporan</span></a
                >
            </li> --}}

            @can('kurir')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1"> <span>Kurir</span> </h6>
            <li>
              <a href="/dashboard/kurir"
                  ><span class="las la-receipt"></span>
                  <span>List Pemesanan</span></a
                >
            </li>
            @endcan

            @can('agen')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1"> <span>Agen</span> </h6>
            <li>
              <a href="/dashboard/agen"
                  ><span class="las la-receipt"></span>
                  <span>Verifikasi</span></a
                >
            </li>
            <li>
              <a href="/dashboard/agen/kuriragen"
                  ><span class="las la-receipt"></span>
                  <span>Kurir Agen</span></a
                >
            </li>
            @endcan
            
        </ul>
    </div>
</div>