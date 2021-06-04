@extends('layouts.app')
@section('content')
<div class="container">
      <br>
      @foreach($user as $p)
      <div class="row">
      <div class="col-md-12">
      	<div class="card">
      		<div class="row">
      			<div class="col-md-1">
               </div>
      			<div class="col-md-6">
      				<br>
      				<h5 class="card-title">{{ $p->name }}</h5>
		              
      			</div>
      			<div class="col-md-3 text-right"><br>
                
                  <a class="btn btn-primary" href="{{url('admin/detail')}}/{{$p->id_pesanan}}">Detail</a>
                  
      			</div>
               <div class="col-md-2"><br>
                  @if($p->status == 'keranjang')
                  <button class="btn btn-primary" disabled>menunggu</button>
                  @elseif($p->status == 'selesai') 
                  <button class="btn btn-success" disabled>{{ $p->status }}</button>  
                  @else
                  <button class="btn btn-danger" disabled>{{ $p->status }}</button>  
                  @endif
               </div>
      		</div>

            <br>          
         </div>
      </div>
  		</div>
  		<br>
      @endforeach
    
</div>
@endsection