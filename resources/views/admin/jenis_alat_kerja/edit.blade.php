@extends('layouts.main')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong> 
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        {{-- <span aria-hidden="true"></span> --}}
      </button>
    </div>
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Maaf!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <h3>Edit Jenis Alat Kerja</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('jenis_alat_kerja_admin.update',[$jenis_alat->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="jenis_alat">Jenis alat</label>
                    <input type="text" class="form-control" id="jenis_alat" name="jenis_alat" placeholder="Jenis Alat" value="{{ $jenis_alat->jenis_alat }}" required>
                </div>
                    {{-- <select id="id_jenis_alat" name="id_jenis_alat" class="custom-select" id="id_jenis_alat">
                        <option selected>Choose...</option>
                        @foreach ($jenis_alat as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis_alat }}</option>
                        @endforeach
                    </select> --}}
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('jenis_alat_kerja_admin') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection