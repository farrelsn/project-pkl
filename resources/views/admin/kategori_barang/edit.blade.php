@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        {{-- <span aria-hidden="true"></span> --}}
      </button>
    </div>
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Maaf!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <h3>Edit Kategori Barang</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('kategori_barang_admin.update',[$kategori_barang->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kategori_barang">Kategori Barang</label>
                    <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" placeholder="Kategori Barang" value="{{ $kategori_barang->kategori_barang }}" required>
                </div>
                    {{-- <select id="id_kategori_barang" name="id_kategori_barang" class="custom-select" id="id_kategori_barang">
                        <option selected>Choose...</option>
                        @foreach ($kategori_barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori_barang }}</option>
                        @endforeach
                    </select> --}}
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('kategori_barang_admin') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection