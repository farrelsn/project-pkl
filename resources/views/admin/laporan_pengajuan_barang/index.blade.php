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
        {{-- <span aria-hidden="true"></span> --}}
      </button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Maaf, </strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        {{-- <span aria-hidden="true">&times;</span> --}}
      </button>
    </div>
    @endif
      {{-- @if ($barang_masuk->count() > 0) --}}
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="row mb-4">
            <form action="{{ route('laporan_pengajuan_barang_admin.filter') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col">
                  <label for="tanggal_awal" class="col-form-label">Tanggal Awal</label>
                  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ $tgl_awal }}" required>
                </div>
                <div class="col">
                  <label for="tanggal_akhir" class="col-form-label">Tanggal Akhir</label>
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $tgl_akhir }}" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <button type="submit" class="btn btn-warning">Filter</button>
                  <a href="{{ route('laporan_pengajuan_barang_admin') }}" class="btn btn-secondary">Reset</a>
                  <a class="btn btn-dark" href="{{ route('laporan_pengajuan_barang.excel') }}">Export</a>
                </div>
              </div>
            </form>
          </div>
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class=" text-center">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Barang</th>
                    <th>Stok Akhir</th>
                    <th>Jumlah</th>
                    <th>Satuan Isi</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuan_barang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stok_akhir }}</td>
                    <td>{{ $item->qtydus }}</td>
                    <td>{{ $item->satuan_isi }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->total }}</td>
                    <td><a class="btn btn-danger" href="{{ route('laporan_pengajuan_barang_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="bi bi-trash-fill"></i></a></td></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      
      
@endsection