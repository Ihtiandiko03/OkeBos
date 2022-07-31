@extends('dashboard.layouts.main')
@section('container')
    <h3>Rute</h3>
    <a href="/dashboard/rute/create" class="btn btn-primary my-3">Buat Rute</a>

    <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Desa/Kecamatan</th>
              <th scope="col">Kabupaten/Kota</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($rute as $rute)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $rute->kecamatan }}</td>
          <td>{{ $rute->kabupatenkota }}</td>
          <td>
                <a href="/dashboard/rute/{{ $rute->id }}/edit" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/rute/{{ $rute->id }}" method="post" class="d-inline">
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