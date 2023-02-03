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
      @if ($barang_masuk->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="row mb-4">
            <form action="{{ route('laporan_barang_masuk_admin.filter') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col">
                  <label for="tanggal_awal" class="col-form-label">Tanggal Awal</label>
                  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="" required>
                </div>
                <div class="col">
                  <label for="tanggal_akhir" class="col-form-label">Tanggal Akhir</label>
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <button type="submit" class="btn btn-warning">Filter</button>
                  <a href="{{ route('laporan_barang_masuk_admin') }}" class="btn btn-secondary">Reset</a>
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
                    <th>Nama Alat</th>
                    <th>Jenis Alat</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barang_masuk as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jenis_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      @endif
      
@endsection