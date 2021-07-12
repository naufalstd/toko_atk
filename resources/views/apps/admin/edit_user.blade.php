@extends('layouts.app')
@section('content')
<div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body row">
				<div class="col-lg-4 col-md-4 col-12">
					<div class="card card-transaction">
					    <div class="card-header">
					        
					         <br>
					       <h1>Edit User</h1>
					       <br>
					    </div>
					     <form action="{{url('edit')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="product-color-options">
                            <h6>Nama</h6>
                            <ul class="list-unstyled mb-0">
                                @csrf
                                <input type="hidden" name="name" value="{{$user->id}}">
                                <input class="form-control" type="text" name="name" required="" value="{{ $user->name}}">                                           
                            </ul>
                        </div>
                        <br>
                        <div class="product-color-options">
                            <h6>Email</h6>
                            <ul class="list-unstyled mb-0">
                                <input class="form-control" type="text" name="email" required="" value="{{ $user->email}}">                                     
                            </ul>
                        </div>
                        <br>
                        
                        
                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                <span class="add-to-cart">Simpan</span>
                            </button>
                        </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
    </div>

@endsection