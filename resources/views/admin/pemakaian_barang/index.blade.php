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
      @if ($pemakaian_barang->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class=" text-center" style="white-space: nowrap">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Kategori Barang</th>
                    <th>Jumlah</th>
                    <th>Stok Awal</th>
                    <th>Stok Akhir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody style="white-space: nowrap">
                  @foreach ($pemakaian_barang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->kategori->kategori_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->barang->stok }}</td>
                    <td>{{ $item->barang->stok - $item->jumlah }}</td>
                    <td class="text-center">
                      {{-- <a class="btn btn-dark" href="{{ route('barang_masuk_admin.edit', [$item->id]) }}"><i class="bi bi-pencil-fill"></i></a> --}}
                      <a class="btn btn-success btn-sm" href="{{ route('pemakaian_barang_admin.storelaporan', [$item->id]) }}" onclick="return confirm('Konfirmasi pemakaian barang?')"><i class="fa-solid fa-check"></i></a>
                      <a class="btn btn-danger btn-sm" href="{{ route('pemakaian_barang_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>{{ $title }} Belum Tersedia.</strong> 
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
                    <h5 class="modal-title">Tambah Pemakaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('pemakaian_barang_admin.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                  <select class="form-select" name="nama_barang" id="nama_barang">
                                      <option value="">Pilih Nama Barang....</option>
                                    @foreach ($barang as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama_barang }} | {{ $item->kategori->kategori_barang }}</option>
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
                            <div class="form-group row" id="row-stok-awal" style="display: none">
                              <div class="col-12">
                                  <label for="stok_awal" class="col-form-label">Stok Awal</label>
                                  <input type="number" class="form-control" id="stok_awal" name="stok_awal" value="" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="jumlah" class="col-form-label">Jumlah</label>
                                  <input type="number" class="form-control" id="jumlah" name="jumlah" value="" required>
                              </div>
                            </div>
                            <div class="form-group row" id="row-stok-akhir" style="display: none">
                              <div class="col-12">
                                  <label for="stok_akhir" class="col-form-label">Stok Akhir</label>
                                  <input type="number" class="form-control" id="stok_akhir" name="stok_akhir" value="" readonly>
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
      
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>

      $(document).on('change', '#nama_barang', function(){
        var id = this.value;
        $.ajax({
          url: "{{ route('pemakaian_barang_admin.getstok') }}",
          type: "POST",
          data: {
            id:id,
            _token: '{{ csrf_token() }}'},
          dataType: 'json',
          success:function(result){
            console.log(result);
            console.log("HELLO PROGRAM TERKUTUK");
            document.getElementById('row-stok-awal').style.display = "block";
            document.getElementById('row-stok-akhir').style.display = "block";
            document.getElementById('jumlah').value = 0;
            document.getElementById('stok_awal').value = result.stok;
            document.getElementById('stok_akhir').value = result.stok;
          }
        });
      });

      $(document).on('input', '#jumlah', function(){
        var jumlah = this.value;
        var id = document.getElementById('nama_barang').value;
        $.ajax({
          url: "{{ route('pemakaian_barang_admin.changestok') }}",
          type: "POST",
          data: {
            jumlah:jumlah,
            id:id,
            _token: '{{ csrf_token() }}'},
          dataType: 'json',
          success:function(result){
            console.log(result);
            console.log("JUMLAH BERUBAH OII");
            document.getElementById('stok_akhir').value = result.stok_akhir;
          }
        });
      });


    </script>
@endsection