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
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <h3>Edit Nama Karyawan</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('lokasi_user.update',[$karyawan->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" id="karyawan" name="karyawan" placeholder="Nama Karyawan" value="{{ $karyawan->karyawan }}" required>
                </div>
                    {{-- <select id="id_karyawan" name="id_karyawan" class="custom-select" id="id_karyawan">
                        <option selected>Choose...</option>
                        @foreach ($karyawan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_karyawan }}</option>
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