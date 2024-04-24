<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanglingkupLainnyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruanglingkup_lainnyas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ruanglingkup_id');
            $table->foreign('ruanglingkup_id')->references('id')->on('ruanglingkup')->onDelete('cascade');
            $table->string('nama');
            $table->string('lainnya')->nullable();
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
        Schema::dropIfExists('ruanglingkup_lainnyas');
    }
}
