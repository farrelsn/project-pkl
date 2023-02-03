@extends('layouts.main')

@section('content')
    <h5>{{ $title }}</h5>
    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title">Topup Balance</h5> --}}
            <form method="POST" class="row g-3" action="{{ route('data_alat_kerja') }}" class="forms-sample">
                <div class="form-group">
                    <label class="form-label" for="nama_alat">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="merk">Nama Alat Kerja</label>
                    <input type="text" class="form-control" id="nama_alat_kerja" name="nama_alat_kerja" placeholder="Merk">
                </div>
                <div class="form-group">
                    <label class="form-label" for="id_jenis_alat">Jenis</label>
                    <select class="form-select" aria-label="Default select example " id="id_jenis_alat" name="id_jenis_alat">
                        <option selected>Choose...</option>
                        @foreach ($jenis_alat as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis_alat }}</option>
                        @endforeach
                      </select>
                    {{-- <select id="id_jenis_alat" name="id_jenis_alat" class="custom-select" id="id_jenis_alat">
                        <option selected>Choose...</option>
                        @foreach ($jenis_alat as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis_alat }}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    {{-- <button type="reset" class="btn btn-sm btn-dark mb-0">Reset</button> --}}
                </div>
            </form>
        </div>
    </div>
@endsection