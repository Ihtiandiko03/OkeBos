@extends('dashboard.layouts.main')
@section('container')
    <div class="table-responsive col-lg-8 mt-4">
    @foreach ($detailKurir as $kurir)
        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $kurir->nama }}</td>
        </tr>
        <tr>
            <th scope="col">Username</th>
            <td>{{ $kurir->username }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{ $kurir->email }}</td>
        </tr>
        <tr>
            <th scope="col">No Telpon</th>
            <td>{{ $kurir->no_telephone }}</td>
        </tr>
        <tr>
            <th scope="col">Kurir Antar</th>
            <td>{{ $kurir->kurir_antar ? 'Iya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <th scope="col">Kurir Jemput</th>
            <td>{{ $kurir->nama ? 'Iya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $kurir->alamat }}</td>
        </tr>
        <tr>
            <th scope="col">Kelurahan</th>
            <td>{{ $kurir->kelurahan }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $kurir->kecamatan }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten / Kota</th>
            <td>{{ $kurir->kabupatenkota }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $kurir->provinsi }}</td>
        </tr>
        <tr>
            <th scope="col">Saldo</th>
            <td>{{ $kurir->saldo }}</td>
        </tr>
        
          </tbody>
        </table>

        @endforeach
      </div>

        <a href="/dashboard/admin/driver">Kembali</a>
@endsection