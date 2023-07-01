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
      <strong>Maaf, </strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        {{-- <span aria-hidden="true">&times;</span> --}}
      </button>
    </div>
    @endif
      @if ($pengajuan_barang->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
              <thead class=" text-center" style="white-space: nowrap">
                <tr>
                  <th>No.</th>
                  <th>Tanggal Masuk</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Qty/Dus </th>
                  <th>Jumlah</th>
                  <th>Stok Awal</th>
                  <th>Stok Akhir</th>
                  <th>Harga Barang</th>
                  <th>Jumlah Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody style="white-space: nowrap">
                @foreach ($pengajuan_barang as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->tanggal_masuk }}</td>
                  <td>{{ $item->barang->nama_barang }}</td>
                  <td>{{ $item->kategori->kategori_barang }}</td>
                  <td>{{ $item->barang->qtydus }}</td>
                  <td>{{ $item->jumlah }}</td>
                  <td>{{ $item->barang->stok }}</td>
                  <td>{{ $item->barang->stok + ($item->barang->qtydus * $item->jumlah)}}</td>
                  <td>{{ $item->barang->harga_baru }}</td>
                  <td>{{ $item->jumlah * $item->barang->harga_baru }}</td>
                  <td class="text-center">
                    <a class="btn btn-success btn-sm" href="{{ route('pengajuan_barang_admin.storelaporan', [$item->id]) }}" onclick="return confirm('Konfirmasi Beli Barang?')"><i class="fa-solid fa-check"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ route('pengajuan_barang_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="9" style="text-align:right">Jumlah Harga Barang:</th>
                  <th></th>
                </tr>
              </tfoot>
          </table>
          </div>
        
        </div>
      </div>
      <div class="d-flex justify-content-between mt-2">
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      <div class="d-flex flex-row-reverse mt-2">
      @endif
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahbarang_view"><i class="bi bi-plus-lg"></i> Tambah</button>
      </div>
      
      {{-- Modal --}}
      <div class="modal fade" data-bs-backdrop="static" data-keyboard="false" id="tambahbarang_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Permintaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('pengajuan_barang_admin.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                  <select class="form-select" name="nama_barang" id="nama_barang">
                                    <option value="" selected>Pilih Nama Barang....</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_barang }} | Stok = {{ $item->stok }} | Qty/Dus = {{ $item->qtydus }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="tanggal_masuk" class="col-form-label">Tanggal</label>
                                  <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $tgl }}" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="jumlah" class="col-form-label">Jumlah</label>
                                  <input type="number" class="form-control" id="jumlah" name="jumlah" value="" required>
                              </div>
                            </div>
                            {{-- <div class="form-group row" id="satuan_isi_container" style="display:none; ">
                              <div class="col-12"> 
                                <label for="satuan_isi" class="col-form-label">Satuan Isi</label>
                                <input type="number" class="form-control" id="satuan_isi" name="satuan_isi" value="0">
                              </div>
                            </div> --}}
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
    
    <script>

      // Kali satuan isi dengan jumlah dus
      // $(document).ready(function(){
      //   $('#qtydus').keyup(function(){
      //     var qtydus = $('#qtydus').val();
      //     var satuan_isi = $('#satuan_isi').val();
      //     var hasil = qtydus * satuan_isi;
      //     $('#qty').val(hasil);
      //   });
      // });
      // Tampilkan satuan isi jika barang yang dipilih adalah dus
      // $(document).ready(function(){
      //   $('#nama_barang').change(function(){
      //     var nama_barang = $('#nama_barang').val();
      //     if(nama_barang == 1){
      //       $('#satuan_isi_container').show();
      //     }else{
      //       $('#satuan_isi_container').hide();
      //     }
      //   });
      // });

    </script>
    {{-- </div>
  </div> --}}
@endsection