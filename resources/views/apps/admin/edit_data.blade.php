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
<li class="breadcrumb-item active" aria-current="page">{{ $barangs->nama_barang}}</li>
</ol>
</nav>
</div>
	<form action="{{url('admin/data/update')}}" method="post" enctype="multipart/form-data" >
@csrf
<div class="col-md-12 mt-3">
<div class="card">
<div class="card-body">
<div class="row">

<div class="col-md-6">

<img src="{{ url('uploads') }}/{{ $barangs->gambar }}" class="rounded mx-auto d-block" width="100%" alt="">
</div>
<div class="col-md-6 mt-5">
<table class="table">
<tbody>

<tr>
<td>Nama Barang</td>
<td>:</td>
<td><input class="form-control" type="text" name="nama_barang" required="" value="{{ $barangs->nama_barang}}"></td>
</tr>
<tr>
<td>Keterangan</td>
<td>:</td>
<td><input class="form-control" type="text" name="keterangan" required="" value="{{ $barangs->keterangan}}"></td>
</tr>
<tr>
	<td>File</td>
<td>:</td>
<td>
	
	<input type="file" name="file" accept=".jpg,.gif,.png" />
</td>
</tr>
<tr>

<td>



<input type="hidden" name="id_barang" value="{{$barangs->id}}">
<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Simpan</button>

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
</form>
</div>
</div>
@endsection