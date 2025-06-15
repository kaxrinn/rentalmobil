<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('perental', function (Blueprint $table) {
            $table->id('id_perental'); // bigint unsigned, auto-increment
            $table->string('nama_perental');
            $table->string('email');
            $table->string('nomor_rekening')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kata_sandi');
            $table->rememberToken(); // varchar(100) nullable
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perental');
    }
};
