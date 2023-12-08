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
          <a href="/kategori/create" class="btn btn-primary btn-block btn-sm">
            <span>Tambah Data</span>
          </a>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Alert -->
@if (session()->has('status'))
    <div class="fade show swalDefaultSuccess" message="{{ session('status') }}"></div>
@endif

<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($kategoris as $kategori)
      <tr>
        <td scope="row">{{ $no++ }}</td>
        <td>{{$kategori->NamaKategori}}</td>
        <td>
          <button type="button" class="btn btn-outline-danger delete" kategoriid="{{ $kategori->id }}" namakategori="{{ $kategori->NamaKategori }}"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>


@endsection

@section("script")
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
        title: "&nbsp;&nbsp;" + message
      })
    });
  });
  </script>

<!-- Script Modal Hapus -->
<script>
  $('.delete').click( function() {
    var kategori_id = $(this).attr('kategoriid');
    var nama_kategori = $(this).attr('namakategori');
    Swal.fire({
      title: "Kamu Yakin?",
      text: "Kamu akan menghapus produk "+nama_kategori+"!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Hapus Saja!",
      cancelButtonText: "Batal"
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location = "/deletekategori/"+kategori_id+""
        // Swal.fire({
        //   title: "Terhapus!",
        //   text: "Produk kamu berhasil dihapus.",
        //   icon: "success"
        // });
      } else {
        Swal.fire({
          title: "Dibatalkan",
          text: "Produk kamu tetap aman :)",
          icon: "error"
        });
      }
    });
  });
  </script>
@endsection