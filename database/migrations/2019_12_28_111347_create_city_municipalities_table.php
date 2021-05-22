<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('label')->nullable();
            $table->string('city_municipality_name');
            $table->unsignedBigInteger('population_2015')->nullable();
            $table->decimal('area_km2',14,2)->nullable();
            $table->decimal('population_density',14,2)->nullable();
            $table->unsignedBigInteger('barangay')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('class')->nullable();
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_municipalities');
    }
}
