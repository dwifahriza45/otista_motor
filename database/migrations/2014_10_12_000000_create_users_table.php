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
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('motor_id')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('users_role');
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
