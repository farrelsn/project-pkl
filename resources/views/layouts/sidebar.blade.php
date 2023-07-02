
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar" aria-labelledby="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 my-3">Menu Utama</div>
            </li>
            <li>
              <a href="{{ route('dashboard') }}" class="nav-link px-3 {{ ($title == 'Dashboard')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-house"></i>{{--<i class="bi bi-speedometer2"></i>--}}</span>

                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            @if (Auth::user()->level == 'user')
            <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Data Master</div>
            </li>

            <li>
              <a href="{{ route('data_barang_user') }}" class="nav-link px-3 {{ ($title == 'Data Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-database"></i></span>
                <span>Data Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('kategori_barang_user') }}" class="nav-link px-3 {{ ($title == 'Kategori Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-tags"></i></span>
                <span>Kategori Barang</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            {{-- Transaksi --}}
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Mutasi Barang</div>
            </li>
            <li>
              <a href="{{ route('permintaan_barang_user') }}" class="nav-link px-3 {{ ($title == 'Daftar Permintaan Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-right-to-bracket"></i></span>
                <span>Permintaan Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pemakaian_barang_user') }}" class="nav-link px-3 {{ ($title == 'Daftar Pemakaian Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span>Pemakaian Barang</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            {{-- Laporan --}}
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Laporan</div>
            </li>
            <li>
              <a href="{{ route('laporan_permintaan_barang_user') }}" class="nav-link px-3 {{ ($title == 'Laporan Permintaan Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-regular fa-folder-open"></i></span>
                <span>Laporan Permintaan Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('laporan_pemakaian_barang_user') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemakaian Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-folder-open"></i></span>
                <span>Laporan Pemakaian Barang</span>
              </a>
            </li>
            @elseif (Auth::user()->level == 'admin')
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Manajemen Pengguna
              </div>
            </li>
            <li>
              <a href="{{ route('data_pengguna_admin') }}" class="nav-link px-3 {{ ($title == 'Data Pengguna')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-user"></i></span>
                <span>Data Pengguna</span>
              </a>
            </li>
            
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
              <li>
                <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Data Master</div>
            </li>

            <li>
              <a href="{{ route('data_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Data Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-database"></i></span>
                <span>Data Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('kategori_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Kategori Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-tags"></i></span>
                <span>Kategori Barang</span>
              </a>
            </li>
            
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            {{-- Transaksi --}}
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Mutasi Barang</div>
            </li>
            <li>
              <a href="{{ route('permintaan_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Daftar Permintaan Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-right-to-bracket"></i></span>
                <span>Permintaan Barang</span>
              </a>
            </li>
            <li>
            <li>
              <a href="{{ route('pemakaian_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Daftar Pemakaian Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span>Pemakaian Barang</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            {{-- Laporan --}}
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Laporan
              </div>
            </li>
            <li>
              <a href="{{ route('laporan_permintaan_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Laporan Permintaan Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-regular fa-folder-open"></i></span>
                <span>Laporan Permintaan Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('laporan_pemakaian_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemakaian Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-folder-open"></i></span>
                <span>Laporan Pemakaian Barang</span>
              </a>
            </li>
              {{-- </div> --}}
            {{-- </div>
            </li> --}}
            @endif
          </ul>
        </nav>
      </div>
</div>
