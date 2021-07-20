@extends('layouts.app')
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
					       <h1>Ubah Password</h1>
					       <br>
					    </div>
					    <form class="auth-reset-password-form mt-2" action="{{url('ubahpassword')}}" method="POST">
					    @csrf
					    <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="reset-password-new">New Password</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" class="form-control form-control-merge" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="1" autofocus />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" tabindex="3">Set New Password</button>
                        </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
</div>

@endsection