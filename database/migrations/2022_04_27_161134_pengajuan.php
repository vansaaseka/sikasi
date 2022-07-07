
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
            $table->foreignId('user_id')->nullable()->default(null)->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mitra_id')->nullable()->default(null)->constrained('mitra')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kategori_id')->nullable()->default(null)->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('ruanglingkup_id')->nullable()->default(null);
            $table->longText('proditerlibat_id')->nullable();
            $table->date('tanggalmulai')->nullable()->default(null);
            $table->date('tanggalakhir')->nullable()->default(null);
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
