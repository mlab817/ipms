<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectProcessingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_processing_statuses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('project_id');
          $table->unsignedBigInteger('processing_status_id')->nullable();
          $table->unsignedBigInteger('processed_by')->nullable();
          $table->text('remarks')->nullable();
          $table->timestamp('processed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
          $table->timestamps();
          $table->boolean('active')->default(true);

          $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
          $table->foreign('processing_status_id')->references('id')->on('processing_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_processing_statuses');
    }
}
