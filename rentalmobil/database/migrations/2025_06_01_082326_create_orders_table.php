<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->string('kode_mobil');
            $table->string('nama_pemesan');
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');
            $table->date('tanggal_pengambilan');
            $table->date('tanggal_pengembalian');
            $table->integer('total_hari');
            $table->decimal('total_harga', 12, 2);
            $table->string('ktp_path');
            $table->string('bukti_pembayaran_path');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('kode_mobil')->references('kode_mobil')->on('mobil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};