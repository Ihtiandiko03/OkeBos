<?php

namespace App\Http\Controllers;

use App\Notifications\ReferrerBonus;
use Illuminate\Support\Facades\Notification;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    protected $redirectTo = '/index';

    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perusahaan' => 'required|max:200',
            'nama' => 'required|max:200',
            'username' => ['required', 'min:8', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255',
            'alamat' => 'required|min:3|max:255',
            'kelurahan' => 'required|min:3|max:255',
            'kecamatan' => 'required|min:3|max:255',
            'kabupaten/kota' => 'required|min:3|max:255',
            'provinsi' => 'required|min:3|max:255',
            'referrer_id',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // $referrer = User::whereUsername(session()->pull('referrer'))->first();
        $referrer = User::with('recursiveReferrer')->first();

        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupaten/kota'       => $request['kabupaten/kota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'password'    => Hash::make($request['password']),
        ]);

        // $request->session()->flash('success', 'Registrasi Berhasil');
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }

    protected function registered(Request $request, $user)
    {
        if ($user->referrer !== null) {
            Notification::send($user->referrer, new ReferrerBonus($user));
        }

        return redirect($this->redirectPath());
    }
}
