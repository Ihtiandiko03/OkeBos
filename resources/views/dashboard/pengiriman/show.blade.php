@extends('dashboard.layouts.main')
@section('container')
    <h3 class="my-3">Rincian Pengiriman</h3>
    <div class="table-responsive col-lg-8 mt-4">
    @foreach ($pengiriman as $pengirimanku)
        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Nomor Resi</th>
            <td>{{ $pengirimanku->nomor_resi }}</td>
        </tr>
        <tr>
            <th scope="col">Jenis Pengiriman</th>
            <td>{{ $pengirimanku->jenis_pengiriman }}</td>
        </tr>
        <tr>
            <th scope="col">Harga</th>
            <td>Rp.{{ $pengirimanku->harga }},00</td>
        </tr>
        <tr>
            <th scope="col">Berat Barang</th>
            <td>{{ $pengirimanku->berat_barang }} Kg</td>
        </tr>
        
          </tbody>
        </table>

        <h4>Pengirim</h4>

        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Perusahaan</th>
            <td>{{ $pengirimanku->perusahaan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $pengirimanku->nama_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $pengirimanku->provinsi_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten/Kota</th>
            <td>{{ $pengirimanku->kabupatenkota_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $pengirimanku->kecamatan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Desa / Kelurahan</th>
            <td>{{ $pengirimanku->kelurahan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $pengirimanku->alamat_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor HP</th>
            <td>{{ $pengirimanku->nomorhp_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor WA</th>
            <td>{{ $pengirimanku->nomorwa_pengirim }}</td>
        </tr>
        
          </tbody>
        </table>

        <h4>Penerima</h4>

        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Perusahaan</th>
            <td>{{ $pengirimanku->perusahaan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $pengirimanku->nama_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $pengirimanku->provinsi_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten/Kota</th>
            <td>{{ $pengirimanku->kabupatenkota_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $pengirimanku->kecamatan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Desa / Kelurahan</th>
            <td>{{ $pengirimanku->kelurahan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $pengirimanku->alamat_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor HP</th>
            <td>{{ $pengirimanku->nomorhp_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor WA</th>
            <td>{{ $pengirimanku->nomorwa_penerima }}</td>
        </tr>
        
          </tbody>
        </table>
        @endforeach
      </div>

      <a href="/dashboard/pengiriman">Kembali</a>
@endsection