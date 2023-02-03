@extends('layouts.main')

@section('content')
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
  <h3>Dashboard</h3>
  <h5>Selamat datang, {{ $username->nama }}</h5>
  @if (Auth::user()->level == 'admin')
    <a href="{{ route('data_pengguna_admin') }}">
      <div class="dashboard-card color1">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $users->count() }}</span>
          </h3>
          <p>User</p>
        </div>
        <div class="float-right">
          <i class="bi bi-people"></i>
        </div>
      </div>
    </a>
    <a href="{{ route('data_barang_admin') }}">
      <div class="dashboard-card color2">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang->count() }}</span>
          </h3>
          <p>Barang</p>
        </div>
        <div class="float-right">
          <i class="bi bi-pen"></i>
        </div>
      </div>
    </a>
    <a href="{{ route('kategori_barang_admin') }}">
      <div class="dashboard-card color3">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $kategori_barang->count() }}</span>
          </h3>
          <p>Kategori Barang</p>
        </div>
        <div class="float-right">
          <i class="bi bi-scissors"></i>
        </div>
      </div>
    </a>
  @elseif (Auth::user()->level == 'user')
    <a href="{{ route('data_barang_user') }}">
      <div class="dashboard-card color2">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang->count() }}</span>
          </h3>
          <p>Barang</p>
        </div>
        <div class="float-right">
          <i class="bi bi-pen"></i>
        </div>
      </div>
    </a>
    <a href="{{ route('kategori_barang_user') }}">
      <div class="dashboard-card color1">
        <div class="float-left">
          <h3><span class="count">{{ $kategori_barang->count() }}</span></h3>
          <p>Kategori Barang</p>
        </div>
        <div class="float-right"><i class="bi bi-scissors"></i>
        </div>
      </div>
    </a>
    
  @endif
@endsection