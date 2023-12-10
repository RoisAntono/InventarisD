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
          <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
          <li class="breadcrumb-item active">{{ $title}}</li>
        </ol> 
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Alert -->
@if (session()->has('status'))
    <div class="fade show swalDefaultSuccess" message="{{ session('status') }}"></div>
@endif

<div class="card">
  <form class="" action="/transaksi" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group" data-select2-id="101">
        <label>Produk</label>
        <select class="form-control select2bs4 select2-hidden-accessible" name="produk_id" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
          @foreach ($produks as $produk)
            @if(old('produk_id') == $produk->id)
              <option selected="selected" data-select2-id="19" value="{{ $produk->id }}" selected>{{ $produk->NamaProduk }}</option>
            @else
              <option data-select2-id="103" value="{{ $produk->id }}">{{ $produk->NamaProduk }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Pelanggan</label>
        <input type="text" name="NamaPelanggan" class="form-control" id="NamaPelanggan" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat Pelanggan</label>
        <input type="text" name="AlamatPelanggan" class="form-control" id="AlamatPelanggan" placeholder="Alamat">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Telepon Pelanggan</label>
        <input type="text" name="TeleponPelanggan" class="form-control" id="TeleponPelanggan" placeholder="08...">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email Pelanggan</label>
        <input type="text" name="EmailPelanggan" class="form-control" id="EmailPelanggan" placeholder="example@example.com">
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

@section('script')
<!-- Script Alert -->
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
  }
    });
  
    $('.swalDefaultSuccess').show(function() {
      var message = $(this).attr('message');
      Toast.fire({
        icon: 'success',
        title: message
      })
    });
  });
  </script>
@endsection