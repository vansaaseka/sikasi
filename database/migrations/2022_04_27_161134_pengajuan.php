
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

            $table->foreignId('kategori_id')->nullable()->default(null)->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ruanglingkup_id')->nullable()->default(null)->constrained('ruanglingkup')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('proditerlibat_id')->nullable()->default(null)->constrained('prodis')->onDelete('cascade')->onUpdate('cascade');
    
            $table->date('tanggalmulai')->nullable()->default(null);
            $table->date('tanggalakhir')->nullable()->default(null);
            $table->string('nomordokumen')->nullable()->default(null);
            $table->string('dokumen')->nullable()->default(null);
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();// ! ! ! THIS STRING ! ! !
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('mitra_id')->nullable();// ! ! ! THIS STRING ! ! !
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
