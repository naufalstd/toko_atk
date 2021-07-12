@extends('layouts.app')

@section('title', 'Kateogri Barang')

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
               <div class="dropdown">
                  <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                  <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
               </div>
            </div>
         </div>
      </div>
      <div class="content-detached content-right">
         <div class="content-body">
            <!-- E-commerce Content Section Starts -->
            <section id="ecommerce-header">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="ecommerce-header-items">
                        <div class="result-toggler">
                           <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                           <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                           </button>
                           <div class="search-results">{{ count($barangs) }} results found</div>
                        </div>
                        <div class="view-options d-flex">
                           <div class="btn-group dropdown-sort">
                              <button type="button" class="btn btn-outline-primary dropdown-toggle mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="active-sorting">Featured</span>
                              </button>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" href="javascript:void(0);">Featured</a>
                                 <a class="dropdown-item" href="javascript:void(0);">Lowest</a>
                                 <a class="dropdown-item" href="javascript:void(0);">Highest</a>
                              </div>
                           </div>
                           <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                              <input type="radio" name="radio_options" id="radio_option1" checked />
                              <i data-feather="grid" class="font-medium-3"></i>
                              </label>
                              <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
                              <input type="radio" name="radio_options" id="radio_option2" />
                              <i data-feather="list" class="font-medium-3"></i>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- E-commerce Content Section Starts -->
            <!-- background Overlay when sidebar is shown  starts-->
            <div class="body-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->
            <!-- CATALOG BARANG -->
            <!-- E-commerce Search Bar Starts -->
            <section id="ecommerce-searchbar" class="ecommerce-searchbar">
               <div class="row mt-1">
                  <div class="col-sm-12">
                     <div class="input-group input-group-merge">
                        <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
                        <div class="input-group-append">
                           <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- E-commerce Search Bar Ends -->
            <!-- E-commerce Products Starts -->
            <!-- LOOPING -->
            @if(Auth::user()->role == 'admin')  <!-- membuat role -->
            <div class="row">
               <div class="col-md-12 text-right">
                  <br>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Barang
                  </button>
               </div>
            </div>
            @endif
            <div class="container mt-2" >
               <div class="row">
                  <section id="ecommerce-product" class="grid-view">
                     @foreach($barangs as $barang)
                     <div class="col-md-4" >
                        <div class="card ecommerce-card" style="width: 15rem;">
                           <img class="img-fluid card-img-top" src="{{ url('uploads') }}/{{ $barang->gambar }}" style="height: 200px" alt="img-placeholder" /></a>
                           <div class="card-body">
                              <h5 class="item-name">{{ $barang->nama_barang }}</h5>
                              <p class="card-text item-description"> {{ $barang->keterangan}}</p>
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
                     @endforeach
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
               <div class="row">
                  <div class="col-sm-9">
                     <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                  </div>
               </div>
               <div class="card">
                  <div class="card-body">
                     <!-- Categories Starts -->
                     <div id="product-categories">
                        <h6 class="filter-title">Categories</h6>
                        <ul class="list-unstyled categories-list">
                           <li>
                              <div class="custom-control custom-radio">
                                 <input type="radio" id="category0" name="category" class="custom-control-input category" value=""/>
                                 <label class="custom-control-label" for="category0">Tanpa Filter</label>
                              </div>
                           </li>
                           @foreach($categori as $c)
                           <li>
                              <div class="custom-control custom-radio">
                                 <input type="radio" id="category{{ $c->id_kategori }}" name="category" class="custom-control-input category" value="{{ $c->id_kategori }}"/>
                                 <label class="custom-control-label" for="category{{ $c->id_kategori }}">{{ $c->keterangan }}</label>
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
      <!-- END: Content-->
      <!-- BEGIN: Customizer-->
      <div class="customizer d-none d-md-block">
         <a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a>
         <div class="customizer-content">
            <!-- Customizer header -->
            <div class="customizer-header px-2 pt-1 pb-0 position-relative">
               <h4 class="mb-0">Theme Customizer</h4>
               <p class="m-0">Customize & Preview in Real Time</p>
               <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
            </div>
            <hr />
            <!-- Styling & Text Direction -->
            <div class="customizer-styling-direction px-2">
               <p class="font-weight-bold">Skin</p>
               <div class="d-flex">
                  <div class="custom-control custom-radio mr-1">
                     <input
                        type="radio"
                        id="skinlight"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        checked
                        data-layout=""
                        />
                     <label class="custom-control-label" for="skinlight">Light</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input
                        type="radio"
                        id="skinbordered"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="bordered-layout"
                        />
                     <label class="custom-control-label" for="skinbordered">Bordered</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input
                        type="radio"
                        id="skindark"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="dark-layout"
                        />
                     <label class="custom-control-label" for="skindark">Dark</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input
                        type="radio"
                        id="skinsemidark"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="semi-dark-layout"
                        />
                     <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
                  </div>
               </div>
            </div>
            <hr />
            <!-- Menu -->
            <div class="customizer-menu px-2">
               <div id="customizer-menu-collapsible" class="d-flex">
                  <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
                  <div class="custom-control custom-control-primary custom-switch">
                     <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
                     <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                  </div>
               </div>
            </div>
            <hr />
            <!-- Layout Width -->
            <div class="customizer-footer px-2">
               <p class="font-weight-bold">Layout Width</p>
               <div class="d-flex">
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
                     <label class="custom-control-label" for="layout-width-full">Full Width</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
                     <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
                  </div>
               </div>
            </div>
            <hr />
            <!-- Navbar -->
            <div class="customizer-navbar px-2">
               <div id="customizer-navbar-colors">
                  <p class="font-weight-bold">Navbar Color</p>
                  <ul class="list-inline unstyled-list">
                     <li class="color-box bg-white border selected" data-navbar-default=""></li>
                     <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                     <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                     <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                     <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                     <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                     <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                     <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                  </ul>
               </div>
               <p class="navbar-type-text font-weight-bold">Navbar Type</p>
               <div class="d-flex">
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
                     <label class="custom-control-label" for="nav-type-floating">Floating</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
                     <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
                     <label class="custom-control-label" for="nav-type-static">Static</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
                     <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
                  </div>
               </div>
            </div>
            <hr />
            <!-- Footer -->
            <div class="customizer-footer px-2">
               <p class="font-weight-bold">Footer Type</p>
               <div class="d-flex">
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="footer-type-sticky" name="footerType" class="custom-control-input" />
                     <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="footer-type-static" name="footerType" class="custom-control-input" checked />
                     <label class="custom-control-label" for="footer-type-static">Static</label>
                  </div>
                  <div class="custom-control custom-radio mr-1">
                     <input type="radio" id="footer-type-hidden" name="footerType" class="custom-control-input" />
                     <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End: Customizer-->
@endsection

@section('addscript')
<script type="text/javascript">
   $(document).on('click', '.category', function()
   {
      window.location.replace("/categori/"+$(this).val());
   });
</script>

@endsection