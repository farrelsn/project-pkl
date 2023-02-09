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
      <h3>{{ $title }}</h3>
      @if ($barang->count() > 0)
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class="text-center">
                  <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Kode Barang</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Kategori Barang</th>
                    <th class="text-center" colspan="{{ $satuan->count() }}">Qty</th>
                    <th rowspan="2">Harga Lama</th>
                    <th rowspan="2">Harga Baru</th>
                    <th rowspan="2">Stok Satuan</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                    @foreach ($satuan as $item)
                    <th>{{ $item->nama_satuan }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori->kategori_barang }}</td>
                    @foreach ($satuan as $sat)
                      @if ($item->satuan == $sat->id)
                      <td>{{ $item->qtydus }}</td>
                      @else
                      <td>-</td>
                      @endif
                    @endforeach
                    @if($item->harga_lama == 0)
                    <td>-</td>
                    @else
                    <td>{{ $item->rupiah($item->harga_lama) }}</td>
                    @endif
                    @if($item->harga_baru == 0)
                    <td>-</td>
                    @else
                    <td>{{ $item->rupiah($item->harga_baru) }}</td>
                    @endif
                    <td>{{ $item->stok }}</td>
                    <td class="text-center">
                      <a class="btn btn-dark" href="{{ route('data_barang_user.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a class="btn btn-danger" href="{{ route('data_barang_user.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      
      <div class="d-flex justify-content-between my-2">
        <a href="{{ route('data_barang_user.export') }}" class="btn btn-dark"><i class="bi bi-file-earmark-excel"></i> Export Excel</a>
        
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      <div class="d-flex flex-row-reverse my-2">
      @endif
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahbarang_view"><i class="bi bi-plus-lg"></i> Tambah</button>
      </div>
      
      {{-- Modal --}}
      <div class="modal fade" data-bs-backdrop="static" data-keyboard="false" id="tambahbarang_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('data_barang_user.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nama_barang" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="kategori_barang" class="col-form-label">Kategori Barang</label>
                                  <select class="form-select" name="kategori_barang" id="kategori_barang">
                                    <option value="">Pilih Kategori Barang....</option>
                                    @foreach ($kategori_barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori_barang }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="stok" class="col-form-label">Stok Satuan</label>
                                  <input type="number" class="form-control" id="stok" name="stok" value="" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="satuan" class="col-form-label">Satuan</label>
                                  <select class="form-select" name="satuan" id="satuan">
                                    <option value="">Pilih Satuan....</option>
                                    @foreach ($satuan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="qtydus" class="col-form-label">Qty</label>
                                  <input type="number" class="form-control" id="qtydus" name="qtydus" value="" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="harga_lama" class="col-form-label">Harga Awal</label>
                                  <input type="number" class="form-control" id="harga_lama" name="harga_lama" value="" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="harga_baru" class="col-form-label">Harga Akhir</label>
                                  <input type="number" class="form-control" id="harga_baru" name="harga_baru" value="" required>
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
      
@endsection