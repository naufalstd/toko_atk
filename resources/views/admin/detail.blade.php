@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12 text-right">
            @if($pesanan->status == 'selesai')
            <button disabled class="btn btn-secondary">Selesai</button>
            @elseif($pesanan->status == 'ditolak')
            <button disabled class="btn btn-danger">ditolak</button>
            @else
            <a class="btn btn-primary" href="{{url('admin/konfirmasi_admin')}}/{{$pesanan->id}}/Konfirmasi">Konfirmasi</a>
            <a class="btn btn-danger" href="{{url('admin/konfirmasi_admin')}}/{{$pesanan->id}}/Tolak">Tolak</a>
            @endif
         </div>
      </div>
      <br>
      @foreach($pesanan_detail as $p)
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
                  
      			</div>
      		</div>           
         </div>
      </div>
  		</div>
  		<br>
      @endforeach
    
</div>
@endsection