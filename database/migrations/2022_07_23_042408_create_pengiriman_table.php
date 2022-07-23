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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->string('nomor_resi')->primary()->autoIncrement();
            $table->float('harga');
            $table->float('berat_barang');
            $table->string('lokasi_barang')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('foto_barang')->nullable();
            $table->string('jenis_pengiriman');
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
        Schema::dropIfExists('pengiriman');
    }
};
