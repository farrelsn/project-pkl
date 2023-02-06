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
    <h3>Edit Nama Jabatan</h3>
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3" action="{{ route('jabatan_user.update',[$jabatan->id]) }}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" value="{{ $jabatan->nama_jabatan }}" required>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-sm btn-success mb-0">Submit</button>
                    <a href="{{ route('jabatan_user') }}" class="btn btn-sm btn-dark mb-0">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection