@extends('layouts.main')

@section('content')
    
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
      </div><!-- /.col -->
      <!--<div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <a class="btn btn-primary btn-block btn-sm">
            <span>Tambah Data</span>
          </a>
        </ol>
      </div> /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
  <form class="" action="/updateproduk/{{ $produks->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Produk</label>
        <input type="text" name="NamaProduk" class="form-control" id="NamaProduk" placeholder="Nama Produk" value="{{ old('NamaProduk', $produks->NamaProduk ) }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi</label>
        <input type="text" name="Deskripsi" class="form-control" id="Deskripsi" placeholder="Deskripsi" value="{{ old('Deskripsi', $produks->Deskripsi ) }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
          </div>
          <input type="number" name="Harga" class="form-control" id="Harga" placeholder="10000" value="{{ old('Harga', $produks->Harga ) }}">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jumlah</label>
        <input type="number" name="JumlahStock" class="form-control" id="jumlah" placeholder="1" value="{{ old('JumlahStock', $produks->JumlahStock ) }}">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection