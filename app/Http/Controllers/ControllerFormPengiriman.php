<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Pengiriman;

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
        return view('dashboard.pengiriman.create');
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
            'berat_barang' => 'required',
            'harga' => 'required',
            'nomor_resi' => 'required',
            'user_id'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

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
            'pengiriman' => Pengiriman::where('nomor_resi', $id)->get()
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
        //
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
        //
    }

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
}
