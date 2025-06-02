<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('alamat_pengambilan')->after('alamat');
            $table->string('nomor_rekening')->after('total_harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn(['alamat_pengambilan', 'nomor_rekening']);
        });
    }
};