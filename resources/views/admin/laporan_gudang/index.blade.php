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
      @if ($barang->count() > 0)
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class=" text-center">
                  <tr>
                    <th>No.</th>
                    <th>Nama Alat</th>
                    {{-- <th>Stok Akhir</th> --}}
                    <th>Stok</th>
                    {{-- <th>Aksi</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    {{-- <td>{{ $item->kategori_barang }}</td> --}}
                    <td>{{ $item->stok }}</td>
                    {{-- <td class="text-center">
                      <a class="btn btn-dark" href="{{ route('data_barang_admin.edit', [$item->id]) }}"><i class="bi bi-pencil-fill"></i></a>
                      <a class="btn btn-danger" href="{{ route('data_barang_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="bi bi-trash-fill"></i></a></td> --}}
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Maaf, </strong> Data alat kerja belum tersedia.
      </div>
      @endif
      
      
@endsection