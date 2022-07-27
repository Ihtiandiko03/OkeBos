<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nama' => 'Ihtiandiko Wicaksono',
            'email' => 'wihtiandiko@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'Ihtiandiko03',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan'
        ]);

        User::factory(5)->create();
        Pengiriman::factory(3)->create();
    }
}
