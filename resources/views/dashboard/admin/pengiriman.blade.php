@extends('dashboard.layouts.main')

@section('container')
    <h3>Seluruh Pengiriman</h3>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($pengiriman as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>
                <a href="/dashboard/pengiriman/{{ $pengirimanku->nomor_resi }}" class="btn btn-info">View</a>
          </td>
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div>
@endsection