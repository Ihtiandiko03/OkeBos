<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
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
            'provinsi' => 'required|min:3|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi Berhasil');
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
