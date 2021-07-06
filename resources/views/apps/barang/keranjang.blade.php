@extends('layouts.app')
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
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps">

                    <div class="sidebar-detached sidebar-left">
         <div class="sidebar">
            <!-- Ecommerce Sidebar Starts -->
            <div class="sidebar-shop">
               <div class="row">
                  <div class="col-sm-9">
                     <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                  </div>
               </div>
            </div>
            <!-- Ecommerce Sidebar Ends -->
         </div>
      </div>
        <!-- Wizard ends -->

        <div class="bs-stepper-content">
            <!-- Checkout Place order starts -->
            <div id="step-cart" class="content">
                <div id="place-order" class="list-view product-checkout">
                    <!-- Checkout Place Order Left starts -->
                    <div class="checkout-items">
                        @foreach($pesanan as $p)
                        <form action="{{ url('update_keranjang')}}/{{$p->id_pesanan_details}}" method="post">
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
                                    <span class="badge badge-primary">{{$p->status}}</span>
                                    <br>
                                    <a class="btn btn-danger btn-sm" href="{{url('konfirmasi_selesai')}}/{{$p->pesanan_id}}">Selesai</a>
                                    @else
                                    <span class="badge badge-primary">{{$p->status}}</span>
                                    @endif
                                
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    <!-- Checkout Place Order Left ends -->

                    <!-- Checkout Place Order Right starts -->

                    <div class="checkout-options">
                        <div class="card">
                            <div class="card-body">
                                @if(Auth::user()->role == 'atasan')
                                    @if($pesanan_belum_konfirmasi > 0)
                                    <a class="btn btn-block btn-primary" href="{{url('konfirmasi_atasan')}}">Konfirmasi Atasan</a>
                                    @endif
                                @else
                                    @if($pesanan_belum_konfirmasi > 0)
                                    <a class="btn btn-block btn-primary" href="{{url('konfirmasi_user')}}">Konfirmasi Pesanan</a>
                                    @endif
                                @endif
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Place Order Right ends -->
                    </div>
                </div>
                <!-- Checkout Place order Ends -->
            </div>
            <!-- Checkout Customer Address Starts -->
            <div id="step-address" class="content">
                <form id="checkout-address" class="list-view product-checkout">


                </form>
            </div>
            <!-- Checkout Customer Address Ends -->


            <!-- </div> -->
        </div>
    </div>

            </div>
        </div>
    </div>

@endsection