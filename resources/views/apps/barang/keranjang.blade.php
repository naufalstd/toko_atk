@extends('layouts.app')
@section('title', 'Keranjang')
@section('content')
<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    @if(Auth::user()->role == 'atasan')
                        @if($pesanan_belum_konfirmasi > 0)
                            <a class="btn btn-block btn-primary" href="{{url('konfirmasi_atasan')}}">Konfirmasi Atasan</a>
                        @else
                            <button disabled class="btn btn-block btn-secondary">Semua Telah di Konfirmasi</button>
                        @endif
                    @else
                        @if($pesanan_belum_konfirmasi > 0)
                            <a class="btn btn-block btn-primary" href="{{url('konfirmasi_user')}}">Konfirmasi Pesanan</a>
                        @else
                            <button disabled class="btn btn-block btn-secondary">Semua Telah di Konfirmasi</button>
                        @endif
                    @endif
                </div>
            </div>

            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps row">

                    <div class="bs-stepper-content col-12">
                        <!-- Checkout Place order starts -->
                        <div id="step-cart" class="content1">
                            <div id="place-order" class="list-view product-checkout1">
                                <!-- Checkout Place Order Left starts -->
                                <div class="checkout-items row">
                                    @foreach($pesanan as $p)
                                    <form action="{{ url('update_keranjang')}}/{{$p->id_pesanan_details}}" method="post" class="col-md-6">
                                        @csrf
                                        <div class="card ecommerce-card">
                                            <div class="item-img">
                                                <a href="app-ecommerce-details.html">
                                                    <img src="{{ url('uploads')}}/{{ $p->gambar }}" alt="img-placeholder" />
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">{{ $p->nama_barang }}</a></h6>
                                                </div>
                                                <div class="item-quantity">
                                                    <span class="quantity-title">Qty:</span>
                                                    <div class="input-group quantity-counter-wrapper" >
                                                        @if($p->status == 'keranjang')
                                                        <input name="jumlah_pesan" type="text" class="touchspin" value="{{ $p->jumlah}}" />
                                                        @else
                                                        <input name="jumlah_pesan" type="text" class="touchspin" value="{{ $p->jumlah}}" disabled />
                                                        @endif
                                                    </div>
                                                </div>
                                                <span class="delivery-date text-muted">{{ $p->keterangan}}</span>
                                                <span class="text-success">{{ $p->tanggal_diupdate}}</span>
                                            </div>

                                            <div class="item-options text-center">
                                                <br>
                                                @if($p->status == 'keranjang')
                                                <a class="btn btn-light" href="{{url('hapus')}}/{{$p->barang_id}}"> <i data-feather="x" class="align-middle mr-25"></i> Remove</a><br>
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="text-truncate">Simpan</span>
                                                </button>
                                                @elseif($p->status == 'dikirim')
                                                <span class="badge badge-glow badge-info">Status : {{ucwords($p->status)}}</span>
                                                <br>
                                                <a class="btn btn-primary btn-sm" href="{{url('konfirmasi_selesai')}}/{{$p->pesanan_id}}">Konfirmasi Diterima</a>
                                                @elseif($p->status == 'selesai')
                                                <div class="badge badge-glow badge-success">Status : {{ucwords($p->status)}}</div>
                                                @else
                                                <span class="badge badge-primary">{{ucwords($p->status)}}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Place order Ends -->
                    </div>
                    <!-- Checkout Customer Address Ends -->


                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>
</div>

@endsection