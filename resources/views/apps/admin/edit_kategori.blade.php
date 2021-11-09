@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body row">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="card card-transaction">
					    <div class="card-header">
					        
					         <br>
					       <h1>Edit Kategori</h1>
					       <br>
					    </div>
					     <form action="{{url('Update_kategori')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
	                        <div class="product-color-options">
	                            <ul class="list-unstyled mb-0">
	                                @csrf
	                                <input type="hidden" name="id" value="{{$categori->id_kategori}}">
	                                <input class="form-control" type="text" name="name" required="" value="{{ $categori->id_kategori}}" hidden="">                                           
	                            </ul>
	                        </div>
                        <br>
	                        <div class="product-color-options">
	                            <h6>Keterangan</h6>
	                            <ul class="list-unstyled mb-0">
	                                <input class="form-control" type="text" name="keterangan" required="" value="{{ $categori->keterangan}}">                                     
	                            </ul>
	                        </div>
                        <hr />
	                        <div class="d-flex flex-column flex-sm-row pt-1">
	                            <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
	                                <span class="add-to-cart">Simpan</span>
	                            </button>
	                        </div>
                    	</div>
                        </form>
					</div>
				</div>
            </div>
        </div>
</div>

@endsection