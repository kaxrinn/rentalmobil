<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Hapus tabel jika sudah ada (untuk fresh install)
        Schema::dropIfExists('mobil');
        
        Schema::create('mobil', function (Blueprint $table) {
            $table->string('kode_mobil', 20)->primary(); // VR001, VR002, dst
            $table->string('merek', 50);
            $table->string('jenis', 50);
            $table->string('warna', 30);
            $table->string('transmisi', 20); // Manual/Automatic
            $table->string('foto')->nullable();
            $table->decimal('harga_harian', 12, 2);
            $table->unsignedInteger('jumlah_kursi');
            $table->string('mesin', 30);
            $table->unsignedInteger('jumlah');
            $table->timestamps(); // created_at dan updated_at
        });

        // Tambahkan trigger untuk auto-generate kode_mobil
        DB::unprepared('
            CREATE TRIGGER before_insert_mobil
            BEFORE INSERT ON mobil
            FOR EACH ROW
            BEGIN
                DECLARE last_num INT;
                DECLARE new_code VARCHAR(20);
                
                SELECT IFNULL(MAX(CAST(SUBSTRING(kode_mobil, 3) AS UNSIGNED)), 0) INTO last_num 
                FROM mobil;
                
                SET new_code = CONCAT("VR", LPAD(last_num + 1, 3, "0"));
                SET NEW.kode_mobil = new_code;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_mobil');
        Schema::dropIfExists('mobil');
    }
};