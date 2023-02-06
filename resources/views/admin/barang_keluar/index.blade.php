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
      <strong>Maaf, </strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
      @if ($barang_keluar->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class=" text-center">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Pemakai</th>
                    <th>Lokasi</th>
                    <th>Lantai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barang_keluar as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->kategori->kategori_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    @if ($item->pegawai == null)
                    <td>-</td>
                    @else
                    <td>{{ $item->pegawai->nama }}</td>
                    @endif
                    @if ($item->lokasi == null)
                    <td>-</td>
                    <td>-</td>
                    @else
                    <td>{{ $item->location->nama_lokasi }}</td>
                    <td>{{ $item->location->lantai }}</td>
                    @endif
                    <td class="text-center">
                      {{-- <a class="btn btn-dark" href="{{ route('barang_masuk_admin.edit', [$item->id]) }}"><i class="bi bi-pencil-fill"></i></a> --}}
                      <a class="btn btn-danger" href="{{ route('barang_keluar_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="bi bi-trash-fill"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      @endif
      <div class="d-flex flex-row-reverse mt-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahbarang_view"><i class="bi bi-plus-lg"></i> Tambah</button>
      </div>
      
      {{-- Modal --}}
      <div class="modal fade" data-bs-backdrop="static" data-keyboard="false" id="tambahbarang_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('barang_keluar_admin.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                  <select class="form-select" name="nama_barang" id="nama_barang">
                                      <option value="">Pilih Nama Barang....</option>
                                    @foreach ($barang as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="tanggal_keluar" class="col-form-label">Tanggal</label>
                                  <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="{{ $tgl }}" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="jumlah_barang" class="col-form-label">Jumlah</label>
                                  <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="pemakai" class="col-form-label">Pegawai</label>
                                  <select class="form-select" name="pemakai" id="pemakai">
                                      <option value="">Pilih Karyawan....</option>
                                    @foreach ($pegawai as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="lokasi" class="col-form-label">Lokasi</label>
                                  <select class="form-select" name="lokasi" id="lokasi">
                                      <option value="">Pilih Lokasi....</option>
                                    @foreach ($lokasi as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-white">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
    {{-- </div>
  </div> --}}
@endsection