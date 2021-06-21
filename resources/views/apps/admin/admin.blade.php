@extends('layouts.app')
@section('content')
<section>
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
</section>
@endsection