<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingUnitPrexcProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_unit_prexc_program', function (Blueprint $table) {
            $table->unsignedBigInteger('operating_unit_id');
            $table->unsignedBigInteger('prexc_program_id');

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('prexc_program_id')->references('id')->on('prexc_programs')->onDelete('cascade');
            $table->unique(['operating_unit_id','prexc_program_id'],'ou_pp_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_unit_prexc_program');
    }
}
