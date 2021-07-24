@extends('layouts.app')
@section('title', 'Edit Password')
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
                                    <input type="password" class="form-control form-control-merge" id="new_password" name="password" placeholder="......." aria-describedby="reset-password-new" tabindex="1" autofocus />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="reset-password-new">Konfirmasi Password</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" class="form-control form-control-merge" id="konfirmasi_password" placeholder="......." />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <button disabled id="button_submit" type="submit" class="btn btn-primary btn-block" tabindex="3">Set New Password</button>
                        </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
</div>

@endsection

@section('addscript')
<script type="text/javascript">
   $(document).on('input', '#konfirmasi_password', function()
   {
      var new_password = $('#new_password').val();
      var konfirmasi_password = $(this).val();

      if(konfirmasi_password != new_password){
        $('#button_submit').prop('disabled', true);
      }else{
        $('#button_submit').prop('disabled', false);
      }
   });
</script>

@endsection