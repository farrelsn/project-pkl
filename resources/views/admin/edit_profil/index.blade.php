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
          <strong>Maaf!</strong> {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
<h3>{{ $title }}</h3>
<div class="card">
    <div class="card-body">
        <form method="POST" class="row g-3" action="{{ route('edit_profil.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-1 mb-1">
                <div class="form-group">
                    <div class="text-center">
                        <div class="container">
                            <img id="pp" style="width: 200px; height: 200px" class="border border-white border-3 rounded-circle" src="{{ $admin->foto == null ? asset('assets/images/default.jpg') : asset('assets/images/foto_profil/'. $admin->foto) }}" alt="...">
                        </div>
                        <div class="form-group">
                            <label for="foto-profil" class="form-label">Silahkan masukkan foto profil</label>
                            <input type="file" class="form-control" id="foto_profil" name="foto_profil" data-allow-reorder="true" onchange="document.getElementById('pp').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        {{-- <input type="file" class="custom-file-input" id="fileProfile" name="fileProfile" data-allow-reorder="true"> --}}
                    </div>
                </div>
            </div>
              
            <div class="form-group">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{ $admin->nama }}" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $admin->username }}" required>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                {{-- <button type="reset" class="btn btn-sm btn-dark mb-0">Reset</button> --}}
            </div>
        </form>
    </div>
</div>
@endsection