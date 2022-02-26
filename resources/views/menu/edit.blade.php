@extends('layouts.menu', ['active' => 'menu'])
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
  <h6 class="font-weight-bolder mb-0">Menu</h6>
</nav>
@endsection

<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Edit</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
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

<form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Menu</strong>
                <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" value="{{ $menu->nama_menu }}">
            </div>
            <div class="form-group">
                <strong>Harga</strong>
                <input type="number" name="harga" class="form-control" placeholder="Rp.1000" value="{{ $menu->harga }}">
            </div>
            <div class="form-group">
                <strong>Deskripsi</strong>
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $menu->deskripsi }}">
            </div>
            <div class="form-group">
                <strong>Ketersediaan</strong>
                <input type="number" name="ketersediaan" class="form-control" placeholder="Ketersediaan" value="{{ $menu->ketersediaan }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>

@endsection