<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mitra_id');
            $table->string('kategori_id')->nullable()->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ruanglingkup_id')->nullable()->constrained('ruanglingkup')->onDelete('cascade')->onUpdate('cascade');
            $table->string('prodi_id')->nullable()->constrained('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggalmulai')->nullable()->default(null);
            $table->date('tanggalakhir')->nullable()->default(null);
            $table->string('nomordokumen')->nullable()->default(null);
            $table->string('dokumen')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('cascade')->onUpdate('cascade');
        
        });

      
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}