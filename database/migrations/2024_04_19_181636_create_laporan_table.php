<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pengajuan_id')->constrained('pengajuan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judulKerjasama');
            $table->string('refrensiKerjasama')->nullable()->default(null);
            $table->string('mitraKerjasama');
            $table->string('ruangLingkup');
            $table->string('hasilPelaksanaan');
            $table->string('linkDokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
