@extends('dashboard.layouts.main')

@section('container')
    <h3>Data Kurir</h3>
    <a href="/dashboard/admin/create" class="btn btn-primary my-3">Tambah Kurir</a>

     <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Kurir Antar</th>
              <th scope="col">Kurir Jemput</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($kurir as $kurir)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kurir->nama }}</td>
          <td>{{ $kurir->kurir_antar ? 'Iya' : 'Tidak' }}</td>
          <td>{{ $kurir->kurir_jemput ? 'Iya' : 'Tidak' }}</td>
          <td>
                <a href="/dashboard/admin/{{ $kurir->username }}" class="btn btn-info">View</a>
                <a href="/dashboard/admin/{{ $kurir->username }}/edit" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/admin/{{ $kurir->username }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
          </td>
        </tr>
        @endforeach
          </tbody>
        </table>
@endsection