@extends('layouts.transaksi')
@section('content')
@section('title')
    Edit
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Transaksi</h6>
</nav>
@endsection    

<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Edit</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
    </div>
</div>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan</strong>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="{{ $transaksi->nama_pelanggan }}">
            </div>
            <div class="form-group">
                <strong>Menu</strong>
                <select name="menu_id" id="menu" class="form-control">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">
                            {{ $menu->nama_menu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <strong>Jumlah</strong>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $transaksi->jumlah }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>


@endsection