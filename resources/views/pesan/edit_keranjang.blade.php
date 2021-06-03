@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<a href="{{ url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
</div>
<div class="col-md-12 mt-2">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $pesanan->nama_barang}}</li>
</ol>
</nav>
</div>
<div class="col-md-12 mt-3">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<form action="{{ url('update_keranjang')}}/{{$pesanan->id}}" method="post">
@csrf
<img src="{{ url('uploads') }}/{{ $pesanan->gambar }}" class="rounded mx-auto d-block" width="100%" alt="">
</div>
<div class="col-md-6 mt-5">
<h2>{{ $pesanan->nama_barang}}</h2>
<table class="table">
<tbody>

<tr>
<td>Jumlah</td>
<td>:</td>
<td><input class="form-control" type="text" name="jumlah_pesan" required="" value="{{ number_format($pesanan->jumlah) }}"></td>
</tr>
<tr>
<td>Keterangan</td>
<td>:</td>
<td>{{ $pesanan->keterangan }}</td>
</tr>
<tr>

<td>


<input type="hidden" name="id_detail_keranjang" value="{{$pesanan->id_pesanan_details}}">
<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Simpan</button>
</form>
</td>
</tr>
<tr>
<td>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection