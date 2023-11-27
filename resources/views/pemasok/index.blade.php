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
          <a href="/produk/create" class="btn btn-primary btn-block btn-sm">
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
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($pemasoks as $pemasok)
          <tr>
            <td scope="row">{{ $no++ }}</td>
            <td>{{$pemasok->NamaPemasok}}</td>
            <td>{{$pemasok->Alamat}}</td>
            <td>{{$pemasok->NomorTelepon}}</td>
            <td>{{$pemasok->Email}}</td>
            <td>
              <a href="/pemasok/{{ $pemasok->id }}/edit" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
              <a href="/deletepemasok/{{ $pemasok->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>


@endsection