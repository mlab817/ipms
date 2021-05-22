<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingUnitReviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_unit_reviewer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operating_unit_id'); // operating unit
            $table->unsignedBigInteger('user_id'); // reviewer
            $table->timestamps();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['operating_unit_id','user_id'],'our_index');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_unit_reviewer');
    }
}
