@extends('dashboard.layouts.main')
@section('container')

  <h3 style="margin-left: 250px">Pengiriman Dalam Kota/Kabupaten</h3>
  <br>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Verifikasi Barang Kurir ke Agen</th>
              
              
            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanDalamWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td>{{ $pengirimanku->verifikasi_kurir_ke_agen ? 'Sudah' : 'Belum' }} 
          @if ($pengirimanku->verifikasi_kurir_ke_agen == 0)
              <br> <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}/edit" class="btn btn-success">Verifikasi</a>
          @endif </td>
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div>

      <h3 style="margin-left: 250px; margin-top:50px">Pengiriman Antar Kota/Kabupaten</h3>
      <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Verifikasi Barang Kurir ke Agen</th>

              
            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanAntarWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td>{{ $pengirimanku->verifikasi_kurir_ke_agen ? 'Sudah' : 'Belum' }} 
          @if ($pengirimanku->verifikasi_kurir_ke_agen == 0)
              <br> <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}/edit" class="btn btn-success">Verifikasi</a>
          @endif </td>
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div>
@endsection