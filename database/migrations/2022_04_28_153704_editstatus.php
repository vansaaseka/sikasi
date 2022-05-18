<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Editstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editstatus', function (Blueprint $table) {
            $table->unsignedBigInteger('pengajuan_id')->nullable();// ! ! ! THIS STRING ! ! !
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('status_id')->nullable();// ! ! ! THIS STRING ! ! !
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('catatan')->nullable();
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
