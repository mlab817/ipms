<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingUnitViewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_unit_viewer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operating_unit_id'); // operating unit
            $table->unsignedBigInteger('user_id'); // viewer
            $table->timestamps();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['operating_unit_id','user_id'],'ouv_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_unit_viewer');
    }
}
