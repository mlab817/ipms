<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('region_id');
            $table->decimal('investment_target_2016',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2017',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2018',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2019',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2020',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2021',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2022',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2023',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2024',14,2)->default(0)->nullable();
            $table->decimal('investment_target_2025',14,2)->default(0)->nullable();
            $table->decimal('investment_target_total',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2016',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2017',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2018',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2019',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2020',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2021',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2022',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2023',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2024',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2025',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_total',14,2)->default(0)->nullable();

            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unique(['project_id','region_id'],'prf_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_financials');
    }
}
