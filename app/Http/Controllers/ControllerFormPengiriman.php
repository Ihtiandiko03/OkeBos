<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Pengiriman;
use Illuminate\Validation\Validator;

class ControllerFormPengiriman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengiriman.index', [
            'pengiriman' => Pengiriman::where('user_id', '=', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengiriman.create', [
            'rutes' => Rute::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perusahaan_pengirim' => 'required',
            'nama_pengirim' => 'required|min:3|max:255',
            'provinsi_pengirim' => 'required|min:3|max:255',
            'kabupatenkota_pengirim' => 'required|min:3|max:255',
            'kecamatan_pengirim' => 'required|min:3|max:255',
            'kelurahan_pengirim' => 'required|min:3|max:255',
            'alamat_pengirim' => 'required',
            'nomorhp_pengirim' => 'required',
            'nomorwa_pengirim' => 'required',

            'perusahaan_penerima' => 'required',
            'nama_penerima' => 'required|min:3|max:255',
            'provinsi_penerima' => 'required|min:3|max:255',
            'kabupatenkota_penerima' => 'required|min:3|max:255',
            'kecamatan_penerima' => 'required|min:3|max:255',
            'kelurahan_penerima' => 'required|min:3|max:255',
            'alamat_penerima' => 'required',
            'nomorhp_penerima' => 'required',
            'nomorwa_penerima' => 'required',

            'jenis_pengiriman' => 'required',
            'rute_awal' => 'required',
            'rute_tujuan' => 'required',
            'user_id',
            'nomor_resi' => 'required',
            'foto_barang' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['foto_barang'] = $request->file('foto_barang')->store('bukti_barang');

        Pengiriman::create($validatedData);

        return redirect('dashboard/pengiriman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.pengiriman.show', [
            'pengiriman' => Pengiriman::where('id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cekkurir = Pengiriman::where('id', $id)->get('verifikasi_kurir_ke_agen');
        $cekagen = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_agen');
        $cekkurir2 = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_kurir');


        if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == false)) {
            return view('dashboard.pengiriman.verifKurirKeAgen', [
                'pengiriman' => Pengiriman::where('id', $id)->get(),
                'rutes' => Rute::all()
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == false)) {
            return view('dashboard.pengiriman.verifAgenKeAgen', [
                'pengiriman' => Pengiriman::where('id', $id)->get(),
                'rutes' => Rute::all()
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == true)) {
            return view('dashboard.pengiriman.verifAgenKeKurir', [
                'pengiriman' => Pengiriman::where('id', $id)->get(),
                'rutes' => Rute::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekkurir = Pengiriman::where('id', $id)->get('verifikasi_kurir_ke_agen');
        $cekagen = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_agen');
        $cekkurir2 = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_kurir');

        if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == false)) {
            Pengiriman::where('id', '=', $id)->update([
                'verifikasi_kurir_ke_agen' => $request['verifikasi_kurir_ke_agen']
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == false)) {
            Pengiriman::where('id', '=', $id)->update([
                'verifikasi_agen_ke_agen' => $request['verifikasi_agen_ke_agen']
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == true)) {
            Pengiriman::where('id', '=', $id)->update([
                'verifikasi_agen_ke_kurir' => $request['verifikasi_agen_ke_kurir']
            ]);
        }



        return redirect('/dashboard/agen');
    }

    // public function verifAgenKeAgen($id)
    // {
    //     return view('dashboard.pengiriman.editpengiriman', [
    //         'pengiriman' => Pengiriman::where('id', $id)->get(),
    //         'rutes' => Rute::all()
    //     ]);;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function barangKeluar()
    {
        return view('dashboard.agen.barangkeluar', [
            'pengiriman' => Pengiriman::where('verifikasi_barang_keluar', 0)->orWhere('verifikasi_barang_keluar', 1)->get(),
            'rutes' => Rute::all()
        ]);
    }
}
