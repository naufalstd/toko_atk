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
					       <h1>Edit User</h1>
					       <br>
					    </div>
					     <form action="{{url('edituser')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
	                        <div class="product-color-options">
	                            <h6>Nama</h6>
	                            <ul class="list-unstyled mb-0">
	                                @csrf
	                                <input type="hidden" name="id" value="{{$user->id}}">
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
                        	<div class="product-color-options">
	                            <h6>Role</h6>
	                           	<select name="role" class="form-control">
                                    <option >Pilih Role</option>
                                    @if($user->role == 'atasan')
                                    <option selected value="atasan">Atasan</option>
                                    <option value="user">User</option>
                                    @elseif($user->role == 'user')
                                    <option value="atasan">Atasan</option>
                                    <option selected value="user">User</option>
                                    @else
                                    <option value="atasan">Atasan</option>
                                    <option value="user">User</option>
                                    @endif
                                </select>
	                        </div>
	                    <br>
	                    	<div class="product-color-options">
	                            <h6>Terhubung dengan </h6>
	                           	<select name="terhubung" class="form-control">
	                           		<option selected>Pilih</option>
	                           	@foreach($userall as $u)
	                           		@if(!empty($terhubung))
	                           		@if($u->id == $terhubung->id_atasan || $u->id == $terhubung->id_bawahan)
                                    <option selected value="{{$u->id}}">{{$u->name}}</option>
                                    @endif
                                    @else
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                    @endif
                                @endforeach   
                                </select>
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