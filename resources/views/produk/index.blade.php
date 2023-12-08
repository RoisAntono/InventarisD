@extends('layouts.main')

@section('content')
    
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <a href="/produk/create" class="btn btn-primary btn-block btn-sm">
            <span>Tambah Data</span>
          </a>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Alert -->
@if (session()->has('status'))
    <div class="fade show swalDefaultSuccess" message="{{ session('status') }}"></div>
@endif

<!-- Table -->
<div class="card">
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($produks as $produk)
      <tr>
        <td scope="row">{{ $no++ }}</td>
        <td>{{$produk->NamaProduk}}</td>

        <!-- Kategori Selection -->
        @if ($produk->kategori)
          <td>{{$produk->kategori->NamaKategori}}</td>
        @else
          <td>Tidak Memiliki Kategori</td>
        @endif
        
        <td>{{$produk->Deskripsi}}</td>
        <td>Rp. {{$produk->Harga}}</td>
        <td>{{$produk->JumlahStock}}</td>
        <td>
          {{-- <!-- <button type="button" class="btn btn-outline-success detail" 
          produkid="{{ $produk->id }}" 
          namapemasok="{{$produk->pemasok->NamaPemasok}}"
          alamat="{{$produk->pemasok->Alamat}}"
          nomortelepon="{{$produk->pemasok->NomorTelepon}}"
          email="{{$produk->pemasok->Email}}"
          >
              <i class="fas fa-search"></i>
          </button> --> --}}
          <a href="/produk/{{ $produk->id }}/edit" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
          <a href="/deleteproduk/{{ $produk->id }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailpemasok">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pemasok</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <address>
          <h4><strong><span id="namapemasok"></span></strong></h4>
          <span id="produkid"></span>

          Alamat : <span id="alamat"></span><br>
          Phone : <span id="nomortelepon"></span></span><br>
          Email : <span id="email"></span></span>
        </address>
      </div>
    </div>
  </div>
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
        title: "&nbsp;&nbsp;" + message
      })
    });
  });
</script>

<!-- Script Modal -->
<script>
$(document).ready( function() {
  $(document).on('click','.detail', function()
  {
    var produkid = $(this).attr('produkid');
    var namapemasok = $(this).attr('namapemasok');
    var alamat = $(this).attr('alamat');
    var nomortelepon = $(this).attr('nomortelepon');
    var email = $(this).attr('email');
    // alert(produkid);
    $('#detailpemasok').modal('show');
    $('#produkid').text(produkid);
    $('#namapemasok').text(namapemasok);
    $('#alamat').text(alamat);
    $('#nomortelepon').text(nomortelepon);
    $('#email').text(email);
  })

  // $.ajax({
  //   type: "GET",
  //   url: "/showproduk/"+produkid,
  //   success: function (response)
  //   {
  //     console.log(response);
  //     // $('#namapemasok').text(response.produk.id)
  //   }
  // });
});
</script>
<!-- <script>
  $(document).ready( function() {
    $(document).on('click','detail', function()
    {
      var produkid = $(this).data('produkid');
      var namapemasok = $(this).data('namapemasok');
      var alamat = $(this).data('alamat');
      var nomortelepon = $(this).data('nomortelepon');
      var email = $(this).data('email');
      $('#produkid').text(produkid);
      $('#namapemasok').text(namapemasok);
      $('#alamat').text(alamat);
      $('#nomortelepon').text(nomortelepon);
      $('#email').text(email);
    })
  })
</script> -->
@endsection