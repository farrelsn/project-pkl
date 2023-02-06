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
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
      @if ($lokasi->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class="text-center">
                  <tr>
                    <th>No.</th>
                    <th>Lokasi</th>
                    <th>Lantai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lokasi as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                    <td>{{ $item->lantai }}</td>
                    <td class="text-center">
                        <a class="btn btn-dark" href="{{ route('lokasi_user.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" href="{{ route('lokasi_user.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></button></td>
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
                    <h5 class="modal-title">Tambah Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('lokasi_user.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nama_lokasi" class="col-form-label">Nama Lokasi</label>
                                    <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="lantai" class="col-form-label">Lantai</label>
                                  <select class="form-select" name="lantai" id="lantai">
                                    <option value="">Pilih Lantai....</option>
                                    <option value="1">Lantai 1</option>
                                    <option value="2">Lantai 2</option>
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
      
@endsection