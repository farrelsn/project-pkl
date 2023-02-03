
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
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
                <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
                <span>Kategori Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pegawai_user') }}" class="nav-link px-3 {{ ($title == 'Data Pegawai')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
                <span>Data Pegawai</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            {{-- Transaksi --}}
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">Transaksi</div>
            </li>
            <li>
              <a href="{{ route('barang_masuk_user') }}" class="nav-link px-3 {{ ($title == 'Daftar Pemasukan Barang')? 'active' : '' }}">
                <span class="me-2"><i class="bi bi-archive-fill"></i></span>
                <span>Pemasukan Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('barang_keluar_user') }}" class="nav-link px-3 {{ ($title == 'Daftar Pemakaian Barang')? 'active' : '' }}">
                <span class="me-2"><i class="bi bi-archive-fill"></i></span>
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
            <div class="mb-4">
              <a href="#layouts" class="nav-link px-3 sidebar-link" data-bs-toggle="collapse">
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Laporan</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="{{ route('laporan_gudang_user') }}" class="nav-link px-3 {{ ($title == 'Laporan Stok Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Master</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laporan_barang_masuk_user') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemasukan Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Pemasukan Barang</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laporan_barang_keluar_user') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemakaian Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Pemakaian Barang</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
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
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Data Master
              </div>
            </li>
            <li>
              <a href="{{ route('data_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Data Barang')? 'active' : '' }}">
                <span class="me-2"><i class="bi bi-archive-fill"></i></span>
                <span>Data Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('kategori_barang_admin') }}" class="nav-link px-3 {{ ($title == 'Kategori Barang')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
                <span>Kategori Barang</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pegawai_admin') }}" class="nav-link px-3 {{ ($title == 'Data Pegawai')? 'active' : '' }}">
                <span class="me-2"><i class="fa-solid fa-toolbox"></i></span>
                <span>Data Pegawai</span>
              </a>
            </li>
            
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Laporan
              </div>
            </li>
            <li>
            <div class="mb-4">
              <a href="#layouts" class="nav-link px-3 sidebar-link" data-bs-toggle="collapse">
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Laporan</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="{{ route('laporan_gudang_admin') }}" class="nav-link px-3 {{ ($title == 'Laporan Stok Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Master</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laporan_barang_masuk_admin') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemasukan Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Pemasukan Barang</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laporan_barang_keluar_admin') }}" class="nav-link px-3 {{ ($title == 'Laporan Pemakaian Barang')? 'active' : '' }}">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Laporan Pemakaian Barang</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            </li>
            @endif
          </ul>
        </nav>
      </div>
</div>
