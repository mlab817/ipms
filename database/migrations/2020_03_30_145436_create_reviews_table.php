<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->boolean('pip')->default(0)->nullable();
            $table->unsignedBigInteger('typology_id')->nullable();
            $table->boolean('cip')->default(0)->nullable();
            $table->unsignedBigInteger('cip_type_id')->nullable();
            $table->boolean('trip')->default(0)->nullable();
            $table->boolean('within_period')->default(0)->nullable();
            $table->unsignedBigInteger('readiness_id')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');;
            $table->foreign('typology_id')->references('id')->on('typologies')->onDelete('set null');
            $table->foreign('readiness_id')->references('id')->on('readinesses')->onDelete('set null');
            $table->foreign('cip_type_id')->references('id')->on('cip_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
