<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrexcActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prexc_activities', function (Blueprint $table) {
          $table->id();
          $table->text('name')->nullable();
          $table->string('acronym')->nullable();
          $table->unsignedBigInteger('operating_unit_id');
          $table->unsignedBigInteger('prexc_program_id')->nullable();
          $table->unsignedBigInteger('prexc_subprogram_id')->nullable();
          $table->unsignedBigInteger('banner_program_id')->nullable();
          $table->string('uacs_code')->nullable();
          $table->unsignedBigInteger('project_id')->nullable();
          $table->boolean('trip')->default(0);

          $table->decimal('investment_target_2016',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2017',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2018',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2019',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2020',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2021',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2022',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2023',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2024',14,2)->nullable()->default(0);
          $table->decimal('investment_target_2025',14,2)->nullable()->default(0);
          $table->decimal('investment_target_total',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2016',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2017',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2018',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2019',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2020',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2021',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2022',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2023',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2024',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_2025',14,2)->nullable()->default(0);
          $table->decimal('infrastructure_target_total',14,2)->nullable()->default(0);
          $table->decimal('gaa_2016',14,2)->default(0)->nullable();
          $table->decimal('gaa_2017',14,2)->default(0)->nullable();
          $table->decimal('gaa_2018',14,2)->default(0)->nullable();
          $table->decimal('gaa_2019',14,2)->default(0)->nullable();
          $table->decimal('gaa_2020',14,2)->default(0)->nullable();
          $table->decimal('gaa_2021',14,2)->default(0)->nullable();
          $table->decimal('gaa_2022',14,2)->default(0)->nullable();
          $table->decimal('gaa_2023',14,2)->default(0)->nullable();
          $table->decimal('gaa_2024',14,2)->default(0)->nullable();
          $table->decimal('gaa_2025',14,2)->default(0)->nullable();
          $table->decimal('gaa_total',14,2)->default(0)->nullable();
          $table->decimal('nep_2016',14,2)->default(0)->nullable();
          $table->decimal('nep_2017',14,2)->default(0)->nullable();
          $table->decimal('nep_2018',14,2)->default(0)->nullable();
          $table->decimal('nep_2019',14,2)->default(0)->nullable();
          $table->decimal('nep_2020',14,2)->default(0)->nullable();
          $table->decimal('nep_2021',14,2)->default(0)->nullable();
          $table->decimal('nep_2022',14,2)->default(0)->nullable();
          $table->decimal('nep_2023',14,2)->default(0)->nullable();
          $table->decimal('nep_2024',14,2)->default(0)->nullable();
          $table->decimal('nep_2025',14,2)->default(0)->nullable();
          $table->decimal('nep_total',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2016',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2017',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2018',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2019',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2020',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2021',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2022',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2023',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2024',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2025',14,2)->default(0)->nullable();
          $table->decimal('disbursement_total',14,2)->default(0)->nullable();
          $table->boolean('finalized')->default(0);
          $table->boolean('validated')->default(0);
          $table->unsignedBigInteger('submission_status_id')->nullable()->default(1);
          $table->unsignedBigInteger('created_by')->nullable();
          $table->unsignedBigInteger('updated_by')->nullable();
          $table->unsignedBigInteger('finalized_by')->nullable();
          $table->unsignedBigInteger('validated_by')->nullable();
          $table->unsignedBigInteger('deleted_by')->nullable();
          $table->timestamps();
          $table->timestamp('finalized_at')->nullable();
          $table->timestamp('validated_at')->nullable();
          $table->softDeletes();

          $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
          $table->foreign('prexc_program_id')->references('id')->on('prexc_programs')->onDelete('set null');
          $table->foreign('prexc_subprogram_id')->references('id')->on('prexc_subprograms')->onDelete('set null');
          $table->foreign('banner_program_id')->references('id')->on('banner_programs')->onDelete('set null');
          $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
          $table->foreign('submission_status_id')->references('id')->on('submission_statuses')->onDelete('set null');
          $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
          $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
          $table->foreign('validated_by')->references('id')->on('users')->onDelete('set null');
          $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prexc_activities');
    }
}
