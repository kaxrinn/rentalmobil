<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasTable('pemesanan')) {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->string('id_pemesanan', 10)->primary();
            $table->string('kode_mobil', 20);
            $table->unsignedBigInteger('id_penyewa');
            $table->date('tanggal_pengambilan');
            $table->date('tanggal_pengembalian');
            $table->timestamps();

            $table->foreign('kode_mobil')->references('kode_mobil')->on('mobil')->onDelete('cascade');
            $table->foreign('id_penyewa')->references('id_penyewa')->on('penyewa')->onDelete('cascade');
        });

       DB::unprepared("
    -- Perbaiki trigger untuk handle timestamp
DROP TRIGGER IF EXISTS before_insert_pemesanan;

DELIMITER //
CREATE TRIGGER before_insert_pemesanan
BEFORE INSERT ON pemesanan
FOR EACH ROW
BEGIN
    DECLARE last_id INT DEFAULT 0;
    
    -- Handle case sensitive table name
    SELECT IFNULL(MAX(CAST(SUBSTRING(id_pemesanan, 3) AS UNSIGNED)), 0) INTO last_id 
    FROM pemesanan;
    
    SET NEW.id_pemesanan = CONCAT('PM', LPAD(last_id + 1, 3, '0'));
    
    -- Force set timestamps
    SET NEW.created_at = CURRENT_TIMESTAMP;
    SET NEW.updated_at = CURRENT_TIMESTAMP;
END//
DELIMITER ;
");
    }}

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_pemesanan');
        Schema::dropIfExists('pemesanan');
    }
};