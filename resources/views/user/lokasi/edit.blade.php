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
    <h3>Edit Nama Lokasi</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('lokasi_user.update',[$lokasi->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="lokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Nama Lokasi" value="{{ $lokasi->nama_lokasi }}" required>
                </div>
                    {{-- <select id="id_lokasi" name="id_lokasi" class="custom-select" id="id_lokasi">
                        <option selected>Choose...</option>
                        @foreach ($lokasi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                        @endforeach
                    </select> --}}
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('lokasi_user') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection