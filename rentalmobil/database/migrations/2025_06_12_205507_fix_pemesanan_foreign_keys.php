<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            // Hapus dulu foreign key yang bermasalah
            $table->dropForeign(['id_penyewa']);
            
            // Tambahkan kembali dengan constraint yang benar
            $table->foreign('id_penyewa')
                  ->references('id_penyewa')
                  ->on('penyewa')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropForeign(['id_penyewa']);
        });
    }
};