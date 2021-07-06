@extends('layouts.app')
@section('content')


<div class="app-content content ecommerce-application">
<div class="container">
      <div class="row">
         <div class="col-md-12 text-right">
            @if($pesanan->status == 'selesai')
            <button disabled class="btn btn-secondary">Selesai</button>
            @elseif($pesanan->status == 'ditolak')
            <button disabled class="btn btn-danger">ditolak</button>
            @elseif($pesanan->status == 'Terkonfirmasi Atasan')
            <a class="btn btn-primary" href="{{url('admin/konfirmasi_admin')}}/{{$pesanan->id}}/Konfirmasi">Konfirmasi</a>
            <a class="btn btn-danger" href="{{url('admin/konfirmasi_admin')}}/{{$pesanan->id}}/Tolak">Tolak</a>
            @elseif($pesanan->status == 'proses')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Konfirmasi Biaya
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Biaya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="{{url('admin/biaya')}}">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="id_pesanan" value="{{$pesanan->id}}">
                    <input type="number" name="biaya" class="form-control">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modal -->
            @endif
         </div>
      </div>
      <br>
      @foreach($pesanan_detail as $p)
      <form action="{{ url('admin/update_pesanan')}}/{{$p->id_pesanan_details}}" method="post">
      @csrf
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
                    <strong>Jumlah pesanan :</strong>
                    <div class="input-group quantity-counter-wrapper" >
                        @if($pesanan->status != 'proses' && $pesanan->status != 'dikirim' && $pesanan->status != 'selesai' )
                        <input name="jumlah_pesan" type="text" class="touchspin" value="{{ $p->jumlah}}" />
                        @else
                        <input name="jumlah_pesan" type="text" class="touchspin" value="{{ $p->jumlah}}" disabled />
                        @endif
                    </div>
                    <br>
                    <strong>Keterangan :</strong>
                    {{ $p->keterangan }}
                    <br>
                    <strong>Status :</strong> <span class="badge badge-primary">{{ $pesanan->status }}</span>
                    </p>
               </div>
                <div class="col-md-2" ><br><br><br><br><br>
                @if($pesanan->status != 'proses' && $pesanan->status != 'dikirim' && $pesanan->status != 'selesai' )
                <button type="submit" class="btn btn-primary">
                    <span class="text-truncate">Simpan</span>
                </button>
                @endif
                </div>
               <div class="col-md-2">
                  <br><br>
                  
               </div>
            </div>           
         </div>
      </div>
      </div>
      <br>
    </form>
      @endforeach
</div>
</div>
@endsection

