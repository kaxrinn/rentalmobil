<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->string('id_penyewaan', 10)->primary(); // CR001, CR002
            $table->string('kode_mobil', 20);
            $table->string('nama_penyewa');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->text('alamat');
            $table->string('alamat_pengambilan');
            $table->date('tanggal_pengambilan');
            $table->date('tanggal_pengembalian');
            $table->integer('total_hari');
            $table->decimal('total_harga', 12, 2);
            $table->string('nomor_rekening');
            $table->string('ktp_path');
            $table->string('bukti_pembayaran_path');
            $table->enum('status', ['Menunggu', 'Konfirmasi', 'Selesai', 'Batal'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('kode_mobil')->references('kode_mobil')->on('mobil');
        });

        // Trigger untuk auto-generate id_penyewaan (misalnya: CR001)
        DB::unprepared('
            CREATE TRIGGER before_insert_pemesanan
            BEFORE INSERT ON pemesanan
            FOR EACH ROW
            BEGIN
                DECLARE last_id INT;
                DECLARE new_id VARCHAR(10);

                SELECT IFNULL(MAX(CAST(SUBSTRING(id_penyewaan, 3) AS UNSIGNED)), 0) INTO last_id FROM pemesanan;

                SET new_id = CONCAT("CR", LPAD(last_id + 1, 3, "0"));
                SET NEW.id_penyewaan = new_id;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS before_insert_pemesanan');
        Schema::dropIfExists('pemesanan');
    }
};
