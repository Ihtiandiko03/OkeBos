@extends('dashboard.layouts.main')
@section('container')
    <a href="/dashboard/admin/createAgen" class="btn btn-primary my-3">Tambah Agen</a>
    <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($agen as $agen)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $agen->nama }}</td>
          <td>
                <a href="/dashboard/admin/{{ $agen->username }}" class="btn btn-info">View</a>
                <a href="/dashboard/admin/{{ $agen->username }}/edit" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/admin/{{ $agen->username }}" method="post" class="d-inline">
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