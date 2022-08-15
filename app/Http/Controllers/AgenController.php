<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Auth;


class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function kurirAgen()
    {
        $auth = Auth::user()->kantor_cabang;

        return view('dashboard.agen.kurirAgen', [
            'kurir' => User::where('kantor_cabang', '=', $auth)
                ->where(function ($query) {
                    $query->where('kurir_antar', '=', 1)
                        ->orWhere('kurir_jemput', '=', 1);
                })->get()
        ]);
    }


    public function index()
    {
        $auth = Auth::user()->kantor_cabang;
        return view('dashboard.agen.index', [
            'pengiriman' => Pengiriman::where('rute_awal', '=', $auth)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
