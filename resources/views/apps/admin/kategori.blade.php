@extends('layouts.app')
@section('title', 'Daftar Kategori')
@section('content')
<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="card card-transaction">
              <div class="card-header">
                   <br>
                 <h1>Kategori</h1>
                 <br>
                  <div class="form-group breadcrumb-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i data-feather="plus"></i> Tambah Kategori
                    </button> 
                  </div>   
                <!-- Modal Tambah Kategori -->
                    <form method="post" enctype="multipart/form-data" action="{{url('admin/data/tambah_kategori')}}">
                       @csrf
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                                </div>
                                <div class="modal-body">
                                   <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">
                                   <br>
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
              <div class="col-lg-14 col-md-14 col-14">
                            <div class="card card-transaction">
                                <div class="card-header">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id Kategori </th>
                                            <th>Keterangan </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($categori as $i => $c)

                                        <tr>
                                            <td>{{$c->id_kategori}}</td>
                                            <td>{{$c->keterangan}}</td>
                                            <td>
                                              <a href="{{ url('kategori/edit')}}/{{ $c->id_kategori}}" class="btn-sm btn btn-primary">
                                                <i data-feather='edit'></i>
                                              </a>
                                              <a href="{{ url('kategori/delete')}}/{{ $c->id_kategori}}" class="btn-sm btn btn-danger">
                                                <i data-feather='trash-2'></i>
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                </div>
          </div>
        </div>
            </div>
        </div>
    </div>

@endsection