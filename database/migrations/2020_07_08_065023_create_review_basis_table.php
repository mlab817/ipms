<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewBasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_basis', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('basis_id');
            $table->timestamps();

            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('basis_id')->references('id')->on('bases')->onDelete('cascade');
            $table->unique(['review_id','basis_id'],'rbasis_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_basis');
    }
}
