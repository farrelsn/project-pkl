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
    <h3>Edit Data Barang</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('data_barang_admin.update',[$barang]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="{{ $barang->nama_barang }}" required>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label for="kategori_barang" class="col-form-label">Kategori Barang</label>
                        <select class="form-select" name="kategori_barang" id="kategori_barang">
                          <option value="">Pilih kategori barang....</option>
                          @foreach ($kategori_barang as $item)
                            @if ($item->id == $barang->kategori->id)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori_barang }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori_barang }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="stok">Stok Tersedia</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{ $barang->stok }}" required>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('data_barang_admin') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection