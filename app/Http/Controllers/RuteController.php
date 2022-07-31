<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rute.index', [
            'rute' => Rute::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Rute::create([
            'kecamatan' => $request['kecamatan'],
            'kabupatenkota' => $request['kabupatenkota']
        ]);

        return redirect('/dashboard/rute');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function show(Rute $rute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.rute.edit', [
            'rute' => Rute::where('id', $id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255'
        ];

        $validated = $request->validate($rules);

        Rute::where('id', '=', $id)->update($validated);

        return redirect('/dashboard/rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Rute::where('id', '=', $id)->delete();

        return redirect('/dashboard/rute/');
    }
}
