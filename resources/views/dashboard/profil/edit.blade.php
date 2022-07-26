@extends('dashboard.layouts.main')
@section('container')
    <h2>Data Diri Anda</h2>
    <div>
        <p>Nama perusahaan: {{ $user[0]->perusahaan }}</p>
        <p>Nama : {{ $user[0]->nama}}</p>
        <p>Username : {{ $user[0]->username }}</p>
        <p>Email : {{ $user[0]->email }}</p>
        <p>Alamat : {{ $user[0]->alamat }}</p>
        <p>Kelurahan : {{ $user[0]->kelurahan }}</p>
        <p>Kecamatan : {{ $user[0]->kecamatan }}</p>
        <p>Kabupaten/Kota : {{ $user[0]->kabupatenkota }}</p>
        <p>Provinsi : {{ $user[0]->provinsi }}</p>

        <a href="/dashboard/profil/{{ $user[0]->id }}/edit">Ubah Data Diri</a>
    </div>
@endsection