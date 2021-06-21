@extends('layouts.app')
@section('content')
    <section class="app-ecommerce-details">
        <div class="card">
            <!-- Product Details starts -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="img-fluid product-img" alt="product image" />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ $barang->nama_barang}}</h4>
                        <p class="card-text">
                            {{ $barang->keterangan }}
                        </p>
                       
                        <hr />
                        <form action="{{ url('pesan')}}/{{$barang->id}}" method="post">
                        <div class="product-color-options">
                            <h6>Jumlah Pesan</h6>
                            <ul class="list-unstyled mb-0">
                                @csrf
                                <input class="form-control" type="number" name="jumlah_pesan" required="">                                           
                            </ul>
                        </div>

                        <div class="product-color-options">
                            <h6>Noted</h6>
                            <ul class="list-unstyled mb-0">
                                <textarea class="form-control" name="noted"></textarea>                                     
                            </ul>
                        </div>
                        
                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                <i data-feather="shopping-cart" class="mr-50"></i>
                                <span class="add-to-cart">Add to cart</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Product Details ends -->

           
        </div>
    </section>
@endsection


