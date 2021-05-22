<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerProgramOperatingUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_program_operating_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('operating_unit_id');
            $table->unsignedBigInteger('banner_program_id');
            $table->timestamps();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('banner_program_id')->references('id')->on('banner_programs')->onDelete('cascade');
            $table->unique(['operating_unit_id','banner_program_id'],'ou_bp_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_program_operating_unit');
    }
}
