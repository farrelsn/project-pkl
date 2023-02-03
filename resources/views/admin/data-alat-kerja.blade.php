@extends('layouts.main')

@section('content')
{{-- <div class="row">
    <div class="col-md-12 mb-3"> --}}
      <h5>{{ $title }}</h5>
      @if ($alat_kerja->count() > 0)
      <div class="card">
        {{-- <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Data Table
        </div> --}}
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered data-table" style="width: 100%">
                <thead class="table-dark">
                  <tr>
                    <th>Nama Alat</th>
                    <th>Jenis Alat</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($alat_kerja as $item)
                  <tr>
                    <td>{{ $item->nama_alat_kerja }}</td>
                    <td>{{ $item->id_jenis_alat }}</td>
                    <td>{{ $item->stok }}</td>
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
    {{-- </div>
  </div> --}}
@endsection