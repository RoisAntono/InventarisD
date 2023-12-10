@extends('layouts.main')

@section('content')
    
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <a href="/transaksi/create" class="btn btn-primary btn-block btn-sm">
            <span>Tambah Data</span>
          </a>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Total Harga</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @php
            $no = 1;
          @endphp
          @foreach($transaksis as $transaksi)
          <tr>
            <td scope="row">{{ $no++}}</td>
            <td>{{ $transaksi->NamaPelanggan }}</td>
            <td>{{ $transaksi->created_at }}</td>
            <td>@rupiah( $transaksi->produk->Harga )</td>
            <td>
              <a href="/transaksi/{{ $transaksi->id }}" class="btn btn-outline-success"><i class="fas fa-search"> Detail Transaksi</i></a>
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Total Harga</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

@endsection