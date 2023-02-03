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
      @if ($alat_kerja->count() > 0)
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class="text-center">
                  <tr>
                    <th>No.</th>
                    <th>Nama Alat</th>
                    <th>Jenis Alat</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($alat_kerja as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_alat_kerja }}</td>
                    <td>{{ $item->jenis_alat_kerja }}</td>
                    <td>{{ $item->stok }}</td>
                    <td class="text-center">
                      <a class="btn btn-dark" href="{{ route('data_alat_kerja_admin.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a class="btn btn-danger" href="{{ route('data_alat_kerja_admin.delete', [$item->id]) }}" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            {{-- {{ $alat_kerja->links() }} --}}
          </div>
        
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Data {{ $title }} Belum Tersedia.</strong> 
      </div>
      @endif
      <div class="d-flex flex-row-reverse mt-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahalatkerja_view"><i class="bi bi-plus-lg"></i> Tambah</button>
      </div>
      
      {{-- Modal --}}
      <div class="modal fade" data-bs-backdrop="static" data-keyboard="false" id="tambahalatkerja_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Alat Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahAlatKerja">
                    <form action="{{ route('data_alat_kerja_admin.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nama_alat" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="jenis_alat" class="col-form-label">Jenis Alat</label>
                                  <select class="form-select" name="jenis_alat" id="jenis_alat">
                                    <option value="">Pilih Jenis Alat....</option>
                                    @foreach ($jenis_alat as $item)
                                        <option value="{{ $item->jenis_alat }}">{{ $item->jenis_alat }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-12">
                                  <label for="stok" class="col-form-label">Stok</label>
                                  <input type="number" class="form-control" id="stok" name="stok" value="" required>
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