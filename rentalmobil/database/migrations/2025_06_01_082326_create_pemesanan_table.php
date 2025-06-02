<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_penyewaan');
            $table->string('kode_mobil');
            $table->string('nama_penyewa');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->text('alamat');
            $table->date('tanggal_pengambilan');
            $table->date('tanggal_pengembalian');
            $table->integer('total_hari');
            $table->decimal('total_harga', 12, 2);
            $table->string('ktp_path');
            $table->string('bukti_pembayaran_path');
            $table->enum('status', ['Menunggu', 'Konfirmasi', 'Selesai', 'Batal'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('kode_mobil')->references('kode_mobil')->on('mobil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};