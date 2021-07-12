@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h1>Welcome to {{ Auth::user()->name }}</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                       <!--  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$jumlahproduk}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Products</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">Rp {{$totalpengeluaran}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Budget</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="check-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$jumlahpesanan}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Jumlah Pesanan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                    

                        
                    </div>

                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="example" class="table" >
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Unit</th>
                                                    <th>Jumlah Produk</th>
                                                    <th>Jumlah Pengeluaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $i => $u)

                                                <tr>
                                                    <td>{{$i+1 }}</td>
                                                    <td>{{$u->name}}</td>
                                                    <td>{{$u->produkdipesan}}</td>
                                                    <td>{{$u->pengeluaran}}</td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->

                        <!-- Transaction Card -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-header">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($barang as $i => $b)

                                        <tr>
                                            <td>{{$i+1 }}</td>
                                            <td>{{$b->nama_barang}}</td>
                                            <td>{{$b->jumlah}}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Transaction Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
<!-- END: Content-->

@endsection

@push('scripts')

<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>

 <!-- BEGIN: Page JS-->
 <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
 <!-- END: Page JS-->
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        } );
    } );
</script>
@endpush