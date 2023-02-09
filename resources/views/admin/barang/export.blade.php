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
      </tr>
      @endforeach
    </tbody>
</table>