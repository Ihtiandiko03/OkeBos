@extends('dashboard.layouts.main')
@section('container')
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Kurir Antar</th>
              <th scope="col">Kurir Jemput</th>
              
            </tr>
          </thead>
          <tbody>
        @foreach ($kurir as $kurirku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kurirku->nama }}</td>
          <td>{{ $kurirku->kurir_antar ? 'Ya' : 'Tidak' }}</td>
          <td>{{ $kurirku->kurir_jemput ? 'Ya' : 'Tidak' }}</td>
          
          <td>
                <a href="/dashboard/agen/kuriragen/showkurir?username={{ $kurirku->username }}" class="btn btn-info">View</a>
          </td>
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div>
@endsection