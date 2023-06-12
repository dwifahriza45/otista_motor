<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('motor_id')->nullable();
            $table->unsignedBigInteger('sparepart1')->nullable();
            $table->unsignedBigInteger('sparepart2')->nullable();
            $table->unsignedBigInteger('sparepart3')->nullable();
            $table->timestamp("in_process")->nullable();
            $table->timestamp("wait_admin")->nullable();
            $table->timestamp("approve_admin")->nullable();
            $table->timestamp("reject_admin")->nullable();
            $table->text('reason_reject_admin')->nullable();
            $table->text('reason_reject_user')->nullable();
            $table->timestamp("done")->nullable();
            $table->integer('kilometer')->nullable();
            $table->text('keluhan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('motor_id')->references('id')->on('motor');
            $table->foreign('sparepart1')->references('id')->on('spareparts');
            $table->foreign('sparepart2')->references('id')->on('spareparts');
            $table->foreign('sparepart3')->references('id')->on('spareparts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
