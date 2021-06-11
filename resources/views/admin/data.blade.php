@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
      <div class="col-md-12 text-left">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Tambah Barang
		</button>
      </div>
      </div>
      <br>

   <div class="row">
     
      @foreach($barangs as $key => $barang)
      <div class="col-md-4">
         <div class="card">
            <img src="{{ url('uploads')}}/{{ $barang->gambar }}" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">{{ $barang->nama_barang }}</h5>
              <p class="card-text">
              <hr>
              <br>
              <strong>Keterangan :</strong>
              <br>
              {{ $barang->keterangan}}
              </p>
              <a href="{{ url('admin/data/edit')}}/{{ $barang->id}}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Edit</a>
              <a href="{{ url('admin/data/delete')}}/{{ $barang->id}}" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Hapus</a>
           </div>
         </div>
      </div>

      @endforeach
   </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<form method="post" enctype="multipart/form-data" action="{{url('admin/data/store')}}">
	@csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="nama_barang" class="form-control" placeholder="nama barang">
        <br>
        <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
        <br>
        <div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection