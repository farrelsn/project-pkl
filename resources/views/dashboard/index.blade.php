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
  <div class="card">
    <div class="card-body">
      <h3 class="text-uppercase pt-2">Dashboard</h3>
      <h5 class="text-center py-4 text-muted">Selamat datang, {{ $username->nama }}</h5>
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body wrapper">
  @if (Auth::user()->level == 'admin')
    <div class="dashboard-card color1">
        <a href="{{ route('data_pengguna_admin') }}">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $users->count() }}</span>
          </h3>
          <p>Pengguna</p>
        </div>
        <div class="float-right">
          <i class="fa-solid fa-user"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color2">
      <a href="{{ route('data_barang_admin') }}">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang->count() }}</span>
          </h3>
          <p>Barang</p>
        </div>
        <div class="float-right">
          <i class="fa-solid fa-box"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color3">
      <a href="{{ route('kategori_barang_admin') }}">
      
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $kategori_barang->count() }}</span>
          </h3>
          <p>Kategori Barang</p>
        </div>
        <div class="float-right">
          <i class="fa-solid fa-tags"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color4">
      <a href="{{ route('pengajuan_barang_admin') }}">
        <div class="float-left">
          <h3>
            <span class="count">{{ $pengajuan_barang->count() }}</span>
          </h3>
          <p>Permintaan Barang</p>
        </div>
        <div class="float-right">
          <i class="fa fa-sign-in fa-5x"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color5">
      <a href="{{ route('barang_keluar_admin') }}">
      
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang_keluar->count() }}</span>
          </h3>
          <p>Pemakaian Barang</p>
        </div>
        <div class="float-right">
          <i class="fa fa-sign-out fa-5x"></i>
        </div>
      </a>
    </div>
  @elseif (Auth::user()->level == 'user')
    <div class="dashboard-card color2">
      <a href="{{ route('data_barang_user') }}">
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang->count() }}</span>
          </h3>
          <p>Barang</p>
        </div>
        <div class="float-right">
          <i class="fa-solid fa-box"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color3"> 
      <a href="{{ route('kategori_barang_user') }}">
        <div class="float-left">
          <h3><span class="count">{{ $kategori_barang->count() }}</span></h3>
          <p>Kategori Barang</p>
        </div>
        <div class="float-right"><i class="fa-solid fa-tags"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color4">
      <a href="{{ route('pengajuan_barang_user') }}">
        <div class="float-left">
          <h3>
            <span class="count">{{ $pengajuan_barang->count() }}</span>
          </h3>
          <p>Permintaan Barang</p>
        </div>
        <div class="float-right">
          <i class="fa fa-sign-in fa-5x"></i>
        </div>
      </a>
    </div>
    <div class="dashboard-card color5">
      <a href="{{ route('barang_keluar_user') }}">
      
        <div class="float-left">
          <h3>
            {{-- <span class="currency">$</span> --}}
            <span class="count">{{ $barang_keluar->count() }}</span>
          </h3>
          <p>Pemakaian Barang</p>
        </div>
        <div class="float-right">
          <i class="fa fa-sign-out fa-5x"></i>
        </div>
      </a>
    </div>
  </div>
  </div>
  @endif
@endsection