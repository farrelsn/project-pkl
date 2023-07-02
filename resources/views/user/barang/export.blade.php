<table id="example" class="display" style="width: 100%" cellspacing="0">
  <thead class="text-center" style="white-space: nowrap;">
    <tr>
      <th>No.</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Kategori Barang</th>
      <th class="text-center">Qty/Dus</th>
      <th>Harga Lama</th>
      <th>Harga Baru</th>
      <th>Stok Satuan</th>
    </tr>
  </thead>
  <tbody style="white-space: nowrap;">
    @foreach ($barang as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->kode_barang }}</td>
      <td>{{ $item->nama_barang }}</td>
      <td>{{ $item->kategori->kategori_barang }}</td>
      <td class="text-center">{{ $item->qtydus }}</td>
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
      <td class="text-center">{{ $item->stok }}</td>
    </tr>
    @endforeach
  </tbody>
</table>