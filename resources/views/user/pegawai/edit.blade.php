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
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
    <h3>Edit Nama Pegawai</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('pegawai_user.update',[$pegawai->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <div class="col-12">
                        <label class="form-label" for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="{{ $pegawai->nama }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label for="jabatan" class="col-form-label">Jabatan</label>
                        <select class="form-select" name="jabatan" id="jabatan">
                          <option value="">Pilih Jabatan....</option>
                          @foreach ($jabatan as $item)
                            @if ($item->id == $pegawai->id_jabatan->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nama_jabatan }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-12">
                      <label class="form-label" for="bagian">Bagian</label>
                      <input type="text" class="form-control" id="bagian" name="bagian" placeholder="Bagian" value="{{ $pegawai->bagian }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-12">
                      <label class="form-label" for="departemen">departemen</label>
                      <input type="text" class="form-control" id="departemen" name="departemen" placeholder="Departemen" value="{{ $pegawai->departemen }}" required>
                  </div>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('pegawai_user') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection