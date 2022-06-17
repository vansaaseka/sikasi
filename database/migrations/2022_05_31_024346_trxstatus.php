<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trxstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxstatus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->nullable()->default(null)->constrained('pengajuan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('status_id')->nullable()->default(null)->constrained('status')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('created_by')->nullable()->default(null)->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('catatan')->nullable();
            $table->string('status_dokumen')->nullable();
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
