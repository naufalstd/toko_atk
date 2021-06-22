@extends('layouts.app')
@section('content')

<div class="app-content content ecommerce-application">
<div class="content-body">
<section class="app-ecommerce-details">
  <div class="card">
    <div class="row my-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <table class="datatables-basic table text-left">
                <thead>
                  <tr>

                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>
                          <a href="{{ url('admin/detail') }}/{{$u->id_pesanan}}" class="btn-sm btn btn-primary">
                              Detail
                          </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
@endsection