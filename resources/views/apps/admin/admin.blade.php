@extends('layouts.app')
@section('title', 'Pesanan')
@section('content')

<div class="app-content content ecommerce-application">
<div class="content-body">
<section class="app-ecommerce-details">
  <div class="card">
      <div class="card-header">
        <h4>Tabel Pesanan</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <table class="datatables-basic table text-left" id="example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Biaya</th>
                    <th>Tanggal Pesan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($user as $i => $u)
                    <tr>
                        <td>{{$i+1 }}</td>
                        <td>{{ucwords($u->name)}}</td>
                        <td>
                          @if($u->status == 'proses')
                            <div class="badge badge-glow badge-warning">{{ucwords($u->status)}}</div>
                          @elseif($u->status == 'dikirim')
                            <div class="badge badge-glow badge-info">{{ucwords($u->status)}}</div>
                          @elseif($u->status == 'selesai')
                            <div class="badge badge-glow badge-success">{{ucwords($u->status)}}</div>
                          @elseif($u->status == 'ditolak')
                            <div class="badge badge-glow badge-danger">{{ucwords($u->status)}}</div>
                          @else
                            <div class="badge badge-glow badge-primary">{{ucwords($u->status)}}</div>
                          @endif
                        </td>
                        <td>
                          @if($u->biaya != '')
                            {{$u->biaya}}
                          @else
                            -
                          @endif
                        </td>
                        <td>{{$u->updated_at}}</td>
                        <td>
                          <a href="{{ url('admin/invoice') }}/{{$u->id_pesanan}}" class="btn-sm btn btn-success">
                              Invoice
                          </a>
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
</section>
</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      'excel', 'pdf', 
      ]
    });
  });
</script>
@endpush