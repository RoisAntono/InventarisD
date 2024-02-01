@extends('layouts.main')

@section('content')
    
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6"> 
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
          <li class="breadcrumb-item active">{{ $title}}</li>
        </ol> 
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> TRASIPRO, Inc.
        <small class="float-right">Date: {{ $transaksi->created_at}}</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      Dari
      <address>
        <strong>{{ $transaksi->NamaPelanggan}}</strong><br>
        {{ $transaksi->AlamatPelanggan}}<br>
        Phone : {{ $transaksi->TeleponPelanggan}}<br>
        Email : {{ $transaksi->EmailPelanggan}}
      </address>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Produk</th>
          <th>Harga Satuan</th>
          <th>Jumlah</th>
          <th>Harga Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>{{ $transaksi->produk->NamaProduk}}</td>
          <td>@rupiah($transaksi->produk->Harga)</td>
          <td>{{ $transaksi->Jumlah}}</td>
          <td>@rupiah($transaksi->produk->Harga * $transaksi->Jumlah)</td>
        </tr>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <!--<div class="row no-print">
    <div class="col-12">
      <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
      
    </div>
  </div>-->
</div>

@endsection