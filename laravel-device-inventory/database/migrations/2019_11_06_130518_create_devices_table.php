<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('vendor');
            $table->string('model');
            $table->string('year');
            $table->boolean('borrowed')->default(false);
            $table->timestamps();

            $table->integer('location_id')->nullable()->unsigned();
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
