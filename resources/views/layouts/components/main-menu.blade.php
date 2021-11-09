<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
         <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
               <a class="navbar-brand" href="{{ url('/')}}">
                 <!--  <span class="brand-logo">
                     <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="35">
                        <img src="{{ asset('image/logo3.jpg') }}">
                     </svg>
                  </span> -->
                  <h2 class="brand-text">KF STOCK</h2>
               </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
         </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ficon" data-feather="home"></i>Dashboard</a></li>
           
            <li class=" nav-item">
               <a class="d-flex align-items-center" href="#"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="eCommerce">Menu ATK</span></a>
               <ul class="menu-content">
                  <!-- role untuk yang bisa lihat hanya admin dan user -->
                  @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                  <li><a class="d-flex align-items-center" href="{{ url('/barang') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Barang</span></a>
                  </li>
                  @endif

                  <!-- role untuk yang bisa lihat hanya admin dan atasan -->
                  @if(Auth::user()->role == 'admin')
                  <li><a class="d-flex align-items-center" href="{{url('admin')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Pesanan</span></a>
                  </li><li><a class="d-flex align-items-center" href="{{url('kategori')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Kategori</span></a>
                  </li>
                  @elseif(Auth::user()->role == 'atasan')
                  <li><a class="d-flex align-items-center" href="{{url('keranjang')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Pesanan</span></a>
                  </li>
                  @else
                  @endif



                  <!-- role untuk yang bisa lihat hanya admin  -->
                  
                  <li>
               </ul>
            </li>
            
             <li class=" nav-item">
               <a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Users</span></a>
               <ul class="menu-content">
                  @if(Auth::user()->role == 'admin')
                  <li><a class="d-flex align-items-center" href="{{url('daftar')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Users</span></a>
                  </li>
                  
                  <li><a class="d-flex align-items-center" href="{{url('admin/dana')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Dana</span></a>
                  </li>
                  @else
                  <li><a class="d-flex align-items-center" href="{{url('ubah_password')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Ganti Password</span></a>
                  </li>
                  @endif
               </ul>
            </li>
            @if(Auth::user()->role == 'admin')
            <li><a class="d-flex align-items-center" href="{{url('ubah_password')}}"><i data-feather="edit"></i><span class="menu-item text-truncate" data-i18n="List">Ganti Password</span></a>
            </li>
            @endif
            
         </ul>
      </div>
   </div>