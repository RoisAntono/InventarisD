@extends('layouts.main')

@section('content')
    
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
          <li class="breadcrumb-item active">{{ $title}}</li>
        </ol> 
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
  <form class="" action="/produk" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Produk</label>
        <input type="text" name="NamaProduk" class="form-control" id="NamaProduk" placeholder="Nama Produk">
      </div>
      <div class="form-group" data-select2-id="101">
        <label>Kategori</label>
        <select class="form-control select2bs4 select2-hidden-accessible" name="kategori_id" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
          @foreach ($kategoris as $kategori)
            @if(old('kategori_id') == $kategori->id)
              <option selected="selected" data-select2-id="19" value="{{ $kategori->id }}" selected>{{ $kategori->NamaKategori }}</option>
            @else
              <option data-select2-id="103" value="{{ $kategori->id }}">{{ $kategori->NamaKategori }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi</label>
        <input type="text" name="Deskripsi" class="form-control" id="Deskripsi" placeholder="Deskripsi">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
          </div>
          <input type="number" name="Harga" class="form-control" id="Harga" placeholder="10000">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jumlah</label>
        <input type="number" name="JumlahStock" class="form-control" id="jumlah" placeholder="1">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection