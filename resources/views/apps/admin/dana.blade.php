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
                    <th>Dana</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($user as $i => $u)
                    <tr>
                        <td>{{$i+1 }}</td>
                        <td>{{$u->name}}</td>
                        <form method="post" action="{{url('admin/dana/update')}}">
                        @csrf
                        
                        <td>
                          <input type="hidden" name="id" value="{{$u->id}}">
                          <input type="number" name="dana" class="form-control" value="{{$u->dana}}">
                        </td>
                        <td>
                          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                        </td>
                        </form>
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