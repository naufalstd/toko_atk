@extends('layouts.app')

@section('title', 'Kategori Barang')

@section('content')
 <!-- END: Main Menu-->
      <!-- BEGIN: Content-->
   <div class="app-content content ecommerce-application">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-left mb-0">Barang</h2>
                  <div class="breadcrumb-wrapper">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Menu ATK</a>
                        </li>
                        <li class="breadcrumb-item active">Barang
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
               @if(Auth::user()->role == 'admin')  <!-- membuat role -->
               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                  <i data-feather="plus"></i> Tambah Barang
               </button>
               @endif
            </div>
         </div>
      </div>
      <div class="content-detached content-right">
         <div class="content-body">
            <section id="ecommerce-searchbar" class="ecommerce-searchbar">
               <div class="row mt-1">
                  <div class="col-sm-12">
                        <form class="input-group input-group-merge" method="GET" action="/barang">
                        <input type="text" class="form-control search-product" name="cari" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
                        <div class="input-group-append">
                           <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                        </div>
                        </form>
                  </div>
               </div>
            </section>

            <div class="container mt-2" >
               <div class="row">
                  <section id="ecommerce-product" class="grid-view">
                     @forelse($barangs as $barang)
                     <div class="col-md-4" >
                        <div class="card ecommerce-card" style="width: 15rem;">
                           <img class="img-fluid card-img-top" src="{{ url('uploads') }}/{{ $barang->gambar }}" style="height: 200px" alt="img-placeholder" /></a>
                           <div class="card-body">
                              <h5 class="item-name">{{ $barang->nama_barang }}</h5>
                              <p class="card-text item-description"> {{ $barang->keterangan}}</p>
                              <p class="card-text item-description"> Estimasi Harga : {{ $barang->harga}}</p>
                              @if(Auth::user()->role == 'user')
                              <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary">
                              <i data-feather="shopping-cart"></i>
                              <span class="add-to-cart">Add to cart</span>
                              </a>
                              @else
                              <a href="{{ url('admin/data/edit') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Edit</a>
                              <a href="{{ url('admin/data/delete') }}/{{ $barang->id }}" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Hapus</a>
                              @endif
                           </div>
                        </div>
                     </div>
                     @empty
                     Tidak ada barang
                     @endforelse
                  </section>
               </div>
            </div>
            <!-- Modal -->
            <form method="post" enctype="multipart/form-data" action="{{url('admin/data/store')}}">
               @csrf
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <br>
                           <select name="id_kategori" class="form-control">
                              <option selected>Pilih Kategori</option>
                              @foreach($categori as $c)
                              <option value="{{ $c->id_kategori }}">{{ $c->keterangan }}</option>
                              @endforeach
                           </select>
                           <br>
                           <input type="text" name="nama_barang" class="form-control" placeholder="nama barang">
                           <br>
                           <input type="text" name="harga" class="form-control" placeholder="harga">
                           <br>
                           <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                           <br>
                           <div class="form-group">
                              <b>File Gambar</b><br/>
                              <input type="file" name="file" accept=".jpg,.gif,.png">
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
         </div>
      </div>
      <!-- END CATALOG -->
      <div class="sidebar-detached sidebar-left">
         <div class="sidebar">
            <!-- Ecommerce Sidebar Starts -->
            <div class="sidebar-shop">
               <div class="card">
                  <div class="card-body">
                     <div id="product-categories">
                        <h6 class="filter-heading">Filter - Categories</h6>
                        <ul class="list-unstyled categories-list">
                           <li>
                              <div class="custom-control custom-radio">
                                 @if($id_kategori == '-')
                                 <input type="radio" id="category0" name="category" class="custom-control-input category" checked value=""/>
                                 <label class="custom-control-label text-primary" for="category0"><b>Semua Barang</b></label>
                                 @else
                                 <input type="radio" id="category0" name="category" class="custom-control-input category" value=""/>
                                 <label class="custom-control-label" for="category0">Semua Barang</label>
                                 @endif
                              </div>
                           </li>
                           @foreach($categori as $c)
                           <li>
                              <div class="custom-control custom-radio">
                                 @if($c->id_kategori == $id_kategori)
                                    <input type="radio" id="category{{ $c->id_kategori }}" name="category" class="custom-control-input category" value="{{ $c->id_kategori }}" checked />
                                    <label class="custom-control-label text-primary" for="category{{ $c->id_kategori }}"><b>{{ $c->keterangan }}</b></label>
                                 @else
                                    <input type="radio" id="category{{ $c->id_kategori }}" name="category" class="custom-control-input category" value="{{ $c->id_kategori }}"/>
                                    <label class="custom-control-label" for="category{{ $c->id_kategori }}">{{ $c->keterangan }}</label>
                                 @endif
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <!-- Clear Filters Ends -->
                  </div>
               </div>
            </div>
            <!-- Ecommerce Sidebar Ends -->
         </div>
      </div>
   </div>
</div>
@endsection

@section('addscript')
<script type="text/javascript">
   $(document).on('click', '.category', function()
   {
      window.location.replace("/categori/"+$(this).val());
   });
</script>

@endsection