@extends('layouts.main')

@section('content')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Maaf, </strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
      <h3>{{ $title }}</h3>
      {{-- @if ($laporan_pemakaian_barang->count() > 0) --}}
      <div class="card">
        <div class="card-body">
          <div class="row mb-4">
            <form action="{{ route('laporan_pemakaian_barang_user.action') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col">
                  <label for="bulan" class="col-form-label">Bulan</label>
                  <select class="form-select" name="bulan" id="bulan">
                    <option value="">Pilih Bulan....</option>
                    <option value="01" {{ $bulan == "01" ? "selected" : "" }} >Januari</option>
                    <option value="02" {{ $bulan == "02" ? "selected" : "" }}>Februari</option>
                    <option value="03" {{ $bulan == "03" ? "selected" : "" }}>Maret</option>
                    <option value="04" {{ $bulan == "04" ? "selected" : "" }}>April</option>
                    <option value="05" {{ $bulan == "05" ? "selected" : "" }}>Mei</option>
                    <option value="06" {{ $bulan == "06" ? "selected" : "" }}>Juni</option>
                    <option value="07" {{ $bulan == "07" ? "selected" : "" }}>Juli</option>
                    <option value="08" {{ $bulan == "08" ? "selected" : "" }}>Agustus</option>
                    <option value="09" {{ $bulan == "09" ? "selected" : "" }}>September</option>
                    <option value="10" {{ $bulan == "10" ? "selected" : "" }}>Oktober</option>
                    <option value="11" {{ $bulan == "11" ? "selected" : "" }}>November</option>
                    <option value="12" {{ $bulan == "12" ? "selected" : "" }}>Desember</option>
                  </select>
                </div>
                <div class="col">
                  <label for="thn" class="col-form-label">Tahun</label>
                  <select class="form-select" name="thn" id="thn" >
                    <option value="">Pilih Tahun....</option>
                    @foreach ($tahun as $item)
                      <option value="{{ $item }}" {{ $thn == $item ? "selected" : "" }}>{{ $item }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <button name="submit" type="submit" class="btn btn-warning" value="filter">Filter</button>
                  <a href="{{ route('laporan_pemakaian_barang_user') }}" class="btn btn-secondary">Reset</a>
                  <button name="submit" type="submit" class="btn btn-dark" value="export">Export</a>
                </div>
              </div>
            </form>
          </div>
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class="text-center" style="white-space: nowrap">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Kategori Barang</th>
                    <th>Stok Awal</th>
                    <th>Jumlah</th>
                    <th>Stok Akhir</th>
                    <th>Tanggal Konfirmasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody style="white-space: nowrap">
                  @foreach ($laporan_pemakaian_barang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    {{-- <td>{{ $item->barang->kode_barang }}</td> --}}
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori_barang }}</td>
                    <td>{{ $item->stok_awal }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->stok_akhir }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><a class="btn btn-danger btn-sm" href="{{ route('laporan_pemakaian_barang_user.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></a></td></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      {{-- @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      @endif --}}
      {{-- <script src="cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}

      
@endsection