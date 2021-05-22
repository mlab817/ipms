<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('acronym');
            $table->unsignedBigInteger('operating_unit_type_id')->nullable();
            $table->string('agency_code')->nullable();
            $table->string('uacs_code')->nullable();
            $table->string('address')->nullable();
            $table->text('image')->nullable();
            $table->string('agency_head_name')->nullable();
            $table->string('agency_head_designation')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('operating_unit_type_id')->references('id')->on('operating_unit_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_units');
    }
}
