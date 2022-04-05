<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DrafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draf', function (Blueprint $table) {
            $table->id();
            $table->string('namadraf');
            $table->string('filedraf')->nullable()->default(null);
            $table->string('deskripsi');
            $table->timestamps();
        });

  
}

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     */
    public function down()
    {
        //
    }
}

