<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id('id_penyewa'); // bigint unsigned auto-increment
            $table->string('nama_penyewa');
            $table->string('email');
            $table->string('nomor_telepon')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kata_sandi');
            $table->rememberToken(); // varchar(100) nullable
            $table->timestamps(); // created_at & updated_at
            $table->string('foto_ktp')->nullable();
            $table->text('alamat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewa');
    }
};
