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
        Schema::create('tb_izin_meninggalkan_kantor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pt', 100);
            $table->string('nama_user', 100);
            $table->string('username_user', 100);
            $table->string('divisi_user', 100);
            $table->timestamp('tanggal_user')->nullable();
            $table->timestamp('tanggal_izin')->nullable();
            $table->text('keterangan_izin')->nullable()->default('text');
            $table->time('jam_mulai')->format('H:i');
            $table->time('jam_akhir')->format('H:i');
            $table->integer('status')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_izin_meninggalkan_kantor');
    }
};
