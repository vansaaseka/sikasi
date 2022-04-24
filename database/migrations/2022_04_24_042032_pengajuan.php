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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mitra_id')->constrained('mitra')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('status_id')->nullable()->default(null)->constrained('status')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ruanglingkup_id')->constrained('ruanglingkup')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade')->onUpdate('cascade');
    
            $table->date('tanggalmulai')->nullable()->default(null);
            $table->date('tanggalakhir')->nullable()->default(null);
            $table->string('nomordokumen')->nullable()->default(null);
            $table->string('dokumen')->nullable()->default(null);
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
        //
    }
}