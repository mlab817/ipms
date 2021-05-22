<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_basis', function (Blueprint $table) {
          $table->unsignedBigInteger('project_id');
          $table->unsignedBigInteger('basis_id');
          $table->timestamps();

          $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
          $table->foreign('basis_id')->references('id')->on('bases')->onDelete('cascade');
          $table->unique(['project_id','basis_id'],'pb_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_basis');
    }
}
