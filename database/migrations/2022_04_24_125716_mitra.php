<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('namamitra');
            $table->string('namadagangmitra')->nullable()->default(null);
            $table->foreignId('mitraKategori_id')->nullable()->default(null)->constrained('mitra_kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kategorimitra_id')->nullable()->constrained('kategorimitra')->onDelete('cascade')->onUpdate('cascade');
            $table->string('alamat');
            $table->string('website');
            $table->string('logo')->nullable()->default(null);
            $table->string('sosmed');
            $table->string('email');
            $table->string('namapenandatangan');
            $table->string('jabatanpenandatangan');
            $table->string('nomor')->nullable();
            $table->string('narahubung')->nullable()->default(null);
            $table->string('no_hp');
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
