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
    Schema::table('penyewa', function (Blueprint $table) {
        $table->string('ktp')->nullable();     // Menyimpan path gambar
        $table->text('alamat')->nullable();    // Menyimpan alamat lengkap
    });
}

public function down()
{
    Schema::table('penyewa', function (Blueprint $table) {
        $table->dropColumn(['ktp', 'alamat']);
    });
}

};
