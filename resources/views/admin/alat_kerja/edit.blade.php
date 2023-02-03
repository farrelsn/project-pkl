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
    <h3>Edit Data Alat Kerja</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('data_alat_kerja_admin.update',[$alat_kerja->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="nama_alat">Nama alat</label>
                    <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama Alat" value="{{ $alat_kerja->nama_alat_kerja }}" required>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label for="jenis_alat" class="col-form-label">Jenis Alat</label>
                        <select class="form-select" name="jenis_alat" id="jenis_alat">
                          <option value="">Pilih Jenis Alat....</option>
                          @foreach ($jenis_alat as $item)
                            @if ($item->jenis_alat == $alat_kerja->jenis_alat_kerja)
                                <option value="{{ $item->jenis_alat }}" selected>{{ $item->jenis_alat }}</option>
                            @else
                                <option value="{{ $item->jenis_alat }}">{{ $item->jenis_alat }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{ $alat_kerja->stok }}" required>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('data_alat_kerja_admin') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection