@extends('layouts.menu', ['active' => 'laporan'])
@section('content')
@section('content')
@section('title')
    Laporan
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Laporan</h6>
</nav>
@endsection

<div class="row">
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Awal</label>
                <input type="date" class="form-control" id="tanggalawal" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tanggalakhir" placeholder="name@example.com">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="filterdata()">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Laporan</h2>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Filter Data
        </button>
    </div>
</div>
<br>

<table class="table table-bordered" id="table">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Pelanggan</th>
        <th class="text-center">Menu</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Total Harga</th>
        <th class="text-center">Nama Pegawai</th>
        <th class="text-center">Tanggal</th>
    </tr>
    @foreach ($transaksis as $transaksi)
    <tr>
        <td class="text-center">{{ ++$i }}</td>
        <td class="text-center">{{ $transaksi->nama_pelanggan }}</td>
        <td class="text-center">{{ $transaksi->menu->nama_menu }}</td>
        <td class="text-center">{{ $transaksi->jumlah }}</td>
        <td class="text-center">Rp. {{ $transaksi->total_harga }}</td>
        <td class="text-center">{{ $transaksi->pegawai->nama }}</td>
        <td class="text-center">{{ date('Y-m-d', strtotime($transaksi->created_at)) }}</td>
    </tr>
    @endforeach
</table>

@endsection
@section('script')
    <script>
        function filterdata() {
            var TanggalAwal = $('#tanggalawal').val()
            var TanggalAkhir = $('#tanggalakhir').val()
            window.location.href = `?tanggalawal=${TanggalAwal}&tanggalakhir=${TanggalAkhir}`
        }
        $(document).ready(()=>{
            $("#table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        })
    </script>
@endsection