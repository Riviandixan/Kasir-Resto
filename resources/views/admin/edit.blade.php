@extends('layouts.admin')
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
  <h6 class="font-weight-bolder mb-0">User</h6>
</nav>
@endsection
    
<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Edit</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
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

<form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $user->nama }}">
            </div>
            <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <strong>Role</strong>
                <select name="role" id="role" class="form-control">
                    <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                    <option value="kasir" @if ($user->role == 'kasir') selected @endif>Kasir</option>
                    <option value="manajer" @if ($user->role == 'manajer') selected @endif>Manajer</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>

@endsection