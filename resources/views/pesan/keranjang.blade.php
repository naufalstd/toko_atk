@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12 text-right">
            @if($pesanan_belum_konfirmasi > 0)
            <a class="btn btn-primary" href="{{url('konfirmasi_user')}}">Konfirmasi Pesanan</a>
            @endif
         </div>
      </div>
      <br>
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
                    <br>
                    <strong>Tanggal Pesan :</strong>
                    {{ $p->tanggal_diupdate}}
		              </p>
                   
      			</div>
      			<div class="col-md-2">
      				<br><br>
                  @if($p->status == 'keranjang')
                  <a class="btn btn-warning" href="{{url('edit_keranjang')}}/{{$p->id}}">Edit</a>
      				<a class="btn btn-danger" href="{{url('hapus')}}/{{$p->barang_id}}">Hapus</a>
                  @else
                  <strong>{{$p->status}}</strong>
                  @endif
      			</div>
      		</div>           
         </div>
      </div>
  		</div>
  		<br>
      @endforeach
    
</div>
@endsection