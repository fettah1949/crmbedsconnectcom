<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotellistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotellists', function (Blueprint $table) {
            $table->id();
            $table->string('Hotel_Code')->unique();
            $table->string('bdc_id')->nullable();
            $table->string('Giata_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('Hotel_Name')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Zip_Code')->nullable();
            $table->string('Email')->nullable();
            $table->string('Country')->nullable();
            $table->string('Country_Code')->nullable();
            $table->string('provider')->nullable();
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
        Schema::dropIfExists('hotellists');
    }
}
