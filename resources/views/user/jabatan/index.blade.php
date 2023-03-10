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
      <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
      @if ($jabatan->count() > 0)
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%" cellspacing="0">
                <thead class="text-center">
                  <tr>
                    <th>No.</th>
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jabatan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_jabatan }}</td>
                    <td class="text-center">
                        <a class="btn btn-dark" href="{{ route('jabatan_user.edit', [$item->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" href="{{ route('jabatan_user.delete', [$item->id]) }}" onclick="return confirm('Data Pegawai dengan jabatan ini akan dihapus. Apa anda yakin ingin menghapusnya?')"><i class="fa-solid fa-trash-can"></i></button></td>
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
                    <h5 class="modal-title">Tambah Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="showModalTambahBarang">
                    <form action="{{ route('jabatan_user.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nama_jabatan" class="col-form-label">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="" required>
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