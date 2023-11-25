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
  <form class="" action="/transaksi" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group" data-select2-id="101">
        <label>Produk</label>
        <select class="form-control select2bs4 select2-hidden-accessible" name="IDProduk" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
          @foreach ($produks as $produk)
            @if(old('IDProduk') == $produk->id)
              <option selected="selected" data-select2-id="19" value="{{ $produk->id }}" selected>{{ $produk->NamaProduk }}</option>
            @else
              <option data-select2-id="103" value="{{ $produk->id }}">{{ $produk->NamaProduk }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Jumlah</label>
        <input type="number" name="Jumlah" class="form-control" id="jumlah" placeholder="1">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection