<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi')->unique();
            $table->float('harga');
            $table->float('berat_barang');
            $table->string('lokasi_barang')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('foto_barang')->nullable();
            $table->string('jenis_pengiriman');
            $table->foreignId('user_id');
            //Pengirim
            $table->string('perusahaan_pengirim');
            $table->string("nama_pengirim");
            $table->string('provinsi_pengirim');
            $table->string('kabupatenkota_pengirim');
            $table->string('kecamatan_pengirim');
            $table->string('kelurahan_pengirim');
            $table->text('alamat_pengirim');
            $table->string('nomorhp_pengirim');
            $table->string('nomorwa_pengirim');
            //Penerima
            $table->string('perusahaan_penerima');
            $table->string("nama_penerima");
            $table->string('provinsi_penerima');
            $table->string('kabupatenkota_penerima');
            $table->string('kecamatan_penerima');
            $table->string('kelurahan_penerima');
            $table->text('alamat_penerima');
            $table->string('nomorhp_penerima');
            $table->string('nomorwa_penerima');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirimen');
    }
};
