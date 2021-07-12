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
					       <h1>Input User</h1>
					       <br>
					    </div>
					    <form method="post" enctype="multipart/form-data" action="{{url('daftar/user')}}">
						@csrf
					    <div class="card-body">
					   		<h5>Nama</h5>
				           <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
				           <br>
				           <h5>Email</h5>
				           <input type="text" name="email" class="form-control" placeholder="Masukan Email">
				           <br>
				           <h5>Password</h5>
				           <input type="password" name="password" class="form-control" placeholder="Masukan Password">
				           <br>
				           <button type="submit" class="btn btn-primary ">Simpan</button>
					    </div>
						</form>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-12">
					<div class="card card-transaction">
					    <div class="card-header">
					        
					         <br>
					       <h1>Data User</h1>
					       <br>
					    </div>

					    <div class="col-lg-12 col-md-12 col-12">
                            <div class="card card-transaction">
                                <div class="card-header">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama </th>
                                            <th>Email </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   	@foreach($user as $i => $u)

                                        <tr>
                                            <td>{{$i+1 }}</td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>
					                          <a href="{{ url('edit')}}/{{ $u->id}}" class="btn-sm btn btn-primary">
					                              <i data-feather='edit'></i>
					                          </a>
					                          <a href="{{ url('delete')}}/{{ $u->id}}" class="btn-sm btn btn-danger">
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