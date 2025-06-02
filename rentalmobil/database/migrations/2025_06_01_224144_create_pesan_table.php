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
    Schema::create('pesan', function (Blueprint $table) {
        $table->id(); // kolom id primary key auto increment
        $table->string('nama'); // kolom untuk nama pengirim
        $table->string('email'); // kolom untuk email pengirim
        $table->text('pesan'); // kolom untuk isi pesan
        $table->timestamps(); // otomatis buat created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan');
    }
};
