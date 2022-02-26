@extends('layouts.transaksi')
@section('content')
@section('title')
    Home
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Transaksi</h6>
</nav>
@endsection

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Transaksi</h2>
        </div>
        <div class="pull-left">
            <a href="{{ route('transaksi.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
<br>

<table class="table table-bordered">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Pelanggan</th>
        <th class="text-center">Menu</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Total Harga</th>
        <th class="text-center">Nama Pegawai</th>
        <th class="text-center">Aksi</th>
    </tr>
    @foreach ($transaksis as $transaksi)
    <tr>
        <td class="text-center">{{ ++$i }}</td>
        <td class="text-center">{{ $transaksi->nama_pelanggan }}</td>
        <td class="text-center">{{ $transaksi->menu->nama_menu }}</td>
        <td class="text-center">{{ $transaksi->jumlah }}</td>
        <td class="text-center">Rp. {{ $transaksi->total_harga }}</td>
        <td class="text-center">{{ $transaksi->pegawai->nama }}</td>
        <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
              <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
              </a>
      
              @csrf
              @method('DELETE')
      
              <button type="submit" class="btn btn-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
              </button>
          </form>
          </td>
    </tr>
    @endforeach
</table>

@endsection