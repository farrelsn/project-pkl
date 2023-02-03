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
        <strong>Maaf!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <h5>{{ $title }}</h5>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('ganti_password.update') }}" enctype="multipart/form-data">
                @csrf              
                <div class="form-group">
                    <label class="form-label" for="password_old">Password Lama</label>
                    <input type="password" class="form-control" id="password_old" name="password_old" placeholder="Password Lama" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password_new">Password Baru</label>
                    <input type="password" class="form-control" id="password_new" name="password_new" placeholder="Password Baru" value="" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password_new">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password Baru" value="" required>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection