<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewParadigmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_paradigm', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('paradigm_id');
            $table->timestamps();

            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('paradigm_id')->references('id')->on('paradigms')->onDelete('cascade');
            $table->unique(['review_id','paradigm_id'],'rp_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_paradigm');
    }
}
