@extends('layouts.app')
@section('content')
<div class="bs-stepper checkout-tab-steps">
        <!-- Wizard starts -->
        <div class="bs-stepper-header">
            <div class="step" data-target="#step-cart">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">
                        <i data-feather="shopping-cart" class="font-medium-3"></i>
                    </span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Cart</span>
                        <span class="bs-stepper-subtitle">Your Cart Items</span>
                    </span>
                </button>
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
                                        <div class="input-group quantity-counter-wrapper">
                                            @if($p->status == 'keranjang')
                                            <input name="jumlah_pesan" type="text" class="quantity-counter" value="{{ $p->jumlah}}" />
                                            @else
                                            <input name="jumlah_pesan" type="text" class="quantity-counter" value="{{ $p->jumlah}}" disabled />
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
                                    @else
                                    <strong>{{$p->status}}</strong>
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

                    <!-- Checkout Customer Address Right starts -->
                    <div class="customer-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">John Doe</h4>
                            </div>
                            <div class="card-body actions">
                                <p class="card-text mb-0">9447 Glen Eagles Drive</p>
                                <p class="card-text">Lewis Center, OH 43035</p>
                                <p class="card-text">UTC-5: Eastern Standard Time (EST)</p>
                                <p class="card-text">202-555-0140</p>
                                <button type="button" class="btn btn-primary btn-block btn-next delivery-address mt-2">
                                    Deliver To This Address
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Customer Address Right ends -->
                </form>
            </div>
            <!-- Checkout Customer Address Ends -->

            <!-- Checkout Payment Starts -->
            <div id="step-payment" class="content">
                <form id="checkout-payment" class="list-view product-checkout" onsubmit="return false;">
                    <div class="payment-type">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Payment options</h4>
                                <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
                            </div>
                            <div class="card-body">
                                <h6 class="card-holder-name my-75">John Doe</h6>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customColorRadio1" name="paymentOptions" class="custom-control-input" checked />
                                    <label class="custom-control-label" for="customColorRadio1">
                                        US Unlocked Debit Card 12XX XXXX XXXX 0000
                                    </label>
                                </div>
                                <div class="customer-cvv mt-1">
                                    <div class="form-inline">
                                        <label class="mb-50" for="card-holder-cvv">Enter CVV:</label>
                                        <input type="password" class="form-control ml-sm-75 ml-0 mb-50 input-cvv" name="input-cvv" id="card-holder-cvv" />
                                        <button type="button" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">Continue</button>
                                    </div>
                                </div>
                                <hr class="my-2" />
                                <ul class="other-payment-options list-unstyled">
                                    <li class="py-50">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customColorRadio2" name="paymentOptions" class="custom-control-input" />
                                            <label class="custom-control-label" for="customColorRadio2"> Credit / Debit / ATM Card </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customColorRadio3" name="paymentOptions" class="custom-control-input" />
                                            <label class="custom-control-label" for="customColorRadio3"> Net Banking </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customColorRadio4" name="paymentOptions" class="custom-control-input" />
                                            <label class="custom-control-label" for="customColorRadio4"> EMI (Easy Installment) </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customColorRadio5" name="paymentOptions" class="custom-control-input" />
                                            <label class="custom-control-label" for="customColorRadio5"> Cash On Delivery </label>
                                        </div>
                                    </li>
                                </ul>
                                <hr class="my-2" />
                                <div class="gift-card mb-25">
                                    <p class="card-text">
                                        <i data-feather="plus-circle" class="mr-50 font-medium-5"></i>
                                        <span class="align-middle">Add Gift Card</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="amount-payable checkout-options">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Price Details</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled price-details">
                                    <li class="price-detail">
                                        <div class="details-title">Price of 3 items</div>
                                        <div class="detail-amt">
                                            <strong>$699.30</strong>
                                        </div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="details-title">Delivery Charges</div>
                                        <div class="detail-amt discount-amt text-success">Free</div>
                                    </li>
                                </ul>
                                <hr />
                                <ul class="list-unstyled price-details">
                                    <li class="price-detail">
                                        <div class="details-title">Amount Payable</div>
                                        <div class="detail-amt font-weight-bolder">$699.30</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Checkout Payment Ends -->
            <!-- </div> -->
        </div>
    </div>
@endsection



    