<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->nullable()->default(null);
            $table->string('nomorhp')->nullable()->default(null);
            $table->integer('nip')->nullable()->default(null);
            $table->foreignId('prodi_id')->nullable()->constrained('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('alamat')->nullable()->default(null);
            $table->string('status')->default(0);
            $table->string('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
