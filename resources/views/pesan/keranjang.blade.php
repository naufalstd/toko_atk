@extends('layouts.app')
@section('content')
<div class="container">
      @foreach($pesanan as $p)
      <div class="row">
      <div class="col-md-12">
      	<div class="card">
      		<div class="row">
      			<div class="col-md-2 text-center">
      				<img style="height: 100px; width: 100px" src="{{ url('uploads')}}/{{ $p->gambar }}" class="card-img-top" alt="...">
      			</div>
      			<div class="col-md-8">
      				<br>
      				<h5 class="card-title">{{ $p->nama_barang }}</h5>
		              <p class="card-text">
		              <strong>Jumlah pesanan :</strong> {{ $p->jumlah}}
		              <br>
		              <strong>Keterangan :</strong>
		              {{ $p->keterangan}}
		              </p><br>
      			</div>
      			<div class="col-md-2">
      				<br><br>
                  <a class="btn btn-warning" href="{{url('edit_keranjang')}}/{{$p->id}}">Edit</a>
      				<a class="btn btn-danger" href="{{url('hapus')}}/{{$p->barang_id}}">Hapus</a>
      			</div>
      		</div>           
         </div>
      </div>
  		</div>
  		<br>
      @endforeach
   
</div>
@endsection