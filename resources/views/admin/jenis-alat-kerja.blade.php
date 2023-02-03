@extends('layouts.main')

@section('content')
<h5>{{ $title }}</h5>
      @if ($jenis_alat->count() > 0)
      <div class="card">
        {{-- <div class="card-header">
          <span><i class="bi bSi-table me-2"></i></span> Data Table
        </div> --}}
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered data-table" style="width: 100%">
                <thead class="table-dark">
                  <tr>
                    <th>Jenis Alat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jenis_alat as $item)
                  <tr>
                    <td>{{ $item->nama_jenis_alat }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td><center><a href="#"><i class="bi bi-pencil-square"></i></a>|<a href="#"><i class="bi bi-trash"></i></a></center></td>
                  </tr>
                  @endforeach
                </tbody>
              {{-- <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot> --}}
            </table>
          </div>
        </div>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <strong>Maaf!</strong> Data alat kerja belum tersedia.
      </div>
      @endif
@endsection