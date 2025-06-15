<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    public function up()
{
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id('id_pembayaran');
        $table->string('id_pemesanan', 10); // Sesuaikan dengan tipe di pemesanan
        $table->unsignedBigInteger('id_penyewa');
        $table->string('kode_mobil', 20);
        $table->integer('total_hari');
        $table->decimal('total_harga', 12, 2);
        $table->string('alamat_pengambilan');
        $table->string('nomor_rekening', 255);
        $table->string('bukti_pembayaran_path', 255)->nullable();
        $table->enum('status', ['Menunggu', 'Konfirmasi', 'Selesai', 'Batal'])->default('Menunggu');
        $table->timestamps();

        $table->foreign('id_pemesanan')
              ->references('id_pemesanan')
              ->on('pemesanan')
              ->onDelete('cascade');
              
        $table->foreign('id_penyewa')
              ->references('id_penyewa')
              ->on('penyewa')
              ->onDelete('cascade');
              
        $table->foreign('kode_mobil')
              ->references('kode_mobil')
              ->on('mobil')
              ->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
}