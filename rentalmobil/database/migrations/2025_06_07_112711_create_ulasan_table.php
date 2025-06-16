<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('ulasan', function (Blueprint $table) {
        $table->id('id_ulasan');
        $table->string('nama_penyewa');
        $table->text('komentar');
        $table->tinyInteger('rating'); // 1-5
        $table->timestamps(); // created_at dan updated_at
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
