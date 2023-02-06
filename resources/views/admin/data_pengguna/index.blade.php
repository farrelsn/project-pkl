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
          <strong>Maaf!</strong> {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <h3>{{ $title }}</h3>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%">
                <thead class="text-center">
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                  <tr>
                    <td>{{ $item->nama}}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->level }}</td>
                    <td class="text-center"><img style="border-radius: 50%" width="30px" height="30px" src="{{ $item->foto == null ? asset('assets/images/default.jpg') :  asset('assets/images/foto_profil/'. $item->foto) }}" alt="user"></td>
                    @if (Auth::user()->id != $item->id)
                      <td class="text-center">
                        <a href="{{ route('data_pengguna_admin.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus pengguna ini?')"><i class="bi bi-trash"></i></a>
                      </td>
                    @else
                      <td class="text-center">
                        Tidak ada aksi
                      </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <button type="button" class="btn btn-success my-2" id="buttonTambahPengguna" data-bs-toggle="modal" data-bs-target="#tambahpengguna_view"><i class="bi bi-plus-lg"></i> Tambah Pengguna</button>
        </div>
      </div>

      {{-- Modal --}}
    <div class="modal fade" data-bs-backdrop="static" data-keyboard="false" id="tambahpengguna_view" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Tambah Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div id="showModalTambahPengguna">
                  <form action="{{ route('data_pengguna_admin.store') }}" method="post">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group row">
                              <div class="col-12">
                                  <label for="nama" class="col-form-label">Nama </label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-12">
                                <label for="nama_pengguna" class="col-form-label">Username</label>
                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-12">
                                <label for="level" class="col-form-label">Level</label>
                                <select class="form-select" name="level" id="level">
                                  <option value="admin">Admin</option>
                                  <option value="user">User</option>
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