<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rute;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function driver()
    {
        return view('dashboard.admin.showdriver', [
            'kurir' => User::where('kurir_antar', '=', 1)->orWhere('kurir_jemput', '=', 1)->latest()->get()
        ]);
    }

    public function agen()
    {
        return view('dashboard.admin.showAgen', [
            'agen' => User::where('agen', '=', 1)->latest()->get()
        ]);
    }

    public function createAgen()
    {
        return view('dashboard.admin.createAgen', [
            'rutes' => Rute::all()
        ]);
    }

    public function storeAgen(Request $request)
    {
        $referrer = User::with('recursiveReferrer')->first();


        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupatenkota'     => $request['kabupatenkota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'password'    => Hash::make($request['password']),
            'no_telephone' => $request['no_telephone'],
            'kantor_cabang' => $request['kantor_cabang'],
            'agen' => $request['agen'] ? $request['agen'] : 0
        ]);

        return redirect('/dashboard/admin/agen');
    }

    public function pengiriman()
    {
        return view('dashboard.admin.pengiriman', [
            'pengiriman' => Pengiriman::all()
        ]);
    }


    public function create()
    {
        return view('dashboard.admin.create', [
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

        $referrer = User::with('recursiveReferrer')->first();


        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupatenkota'     => $request['kabupatenkota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'kurir_antar' => $request['kurir_antar'] ? $request['kurir_antar'] : 0,
            'kurir_jemput' => $request['kurir_jemput'] ? $request['kurir_jemput'] : 0,
            'password'    => Hash::make($request['password']),
            'no_telephone' => $request['no_telephone'],
            'kantor_cabang' => $request['kantor_cabang']
        ]);

        return redirect('/dashboard/admin/driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return view('dashboard.admin.showDetailKurir', [
            'detailKurir' => User::where('username', $username)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        return view('dashboard.admin.edit', [
            'kurir' => User::where('username', $username)->get(),
            'rutes' => Rute::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {

        $rules = [
            'nama' => 'min:3|max:255',
            'no_telephone' => 'min:9|max:15',
            'alamat' => 'min:3',
            'kelurahan' => 'min:3|max:255',
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255',
            'provinsi' => 'min:3|max:255',
            'email',
            'kantor_cabang'

        ];

        $validated = $request->validate($rules);

        if ($request['email'] != User::where('username', '=', $username)->get('email')) {
            $validated['email'] = $request['email'];
        }
        User::where('username', '=', $username)->update($validated);

        return redirect('/dashboard/admin/agen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $username)
    {
        $deleted = User::where('username', '=', $username)->delete();

        return redirect('/dashboard/admin/driver');
    }

    public function ubahProfilKurir()
    {
        if (request('username')) {
            return view('dashboard.admin.ubahprofilkurir', [
                'kurir' => User::where('username', '=', request('username'))->get()
            ]);
        }
    }

    public function storeProfilKurir(Request $request, $username)
    {
        $rules = [
            'nama' => 'min:3|max:255',
            'no_telephone' => 'min:9|max:15',
            'alamat' => 'min:3',
            'kelurahan' => 'min:3|max:255',
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255',
            'provinsi' => 'min:3|max:255',
            'email',
            'kantor_cabang',
            'kurir_antar' => $request['kurir_antar'] ? $request['kurir_antar'] : 0,
            'kurir_jemput' => $request['kurir_jemput'] ? $request['kurir_jemput'] : 0,

        ];

        $validated = $request->validate($rules);

        if ($request['email'] != User::where('username', '=', $username)->get('email')) {
            $validated['email'] = $request['email'];
        }
        User::where('username', '=', $username)->update($validated);

        return redirect('/dashboard/admin/driver');
    }
}
