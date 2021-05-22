<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable()->unique();
            $table->unsignedBigInteger('prexc_program_id')->nullable();
            $table->unsignedBigInteger('prexc_subprogram_id')->nullable();
            $table->unsignedBigInteger('prexc_activity_id')->nullable();
            $table->string("pipol_url")->nullable();
            $table->unsignedBigInteger('pipol_id')->nullable();
            $table->string("pipol_code")->nullable();
            $table->boolean("pip")->default(0);
            $table->boolean("cip")->default(0);
            $table->unsignedBigInteger("cip_type_id")->nullable();
            $table->boolean("trip")->default(0);
            $table->boolean("afmip")->default(0);
            $table->boolean("rdip")->default(0);
            $table->boolean("pcip")->default(0);
            $table->text("title")->nullable();
            $table->text('slug')->nullable();
            $table->unsignedBigInteger("type_id")->nullable();
            $table->boolean('regular')->nullable()->default(false);
            $table->boolean('research')->nullable()->default(false);
            $table->unsignedBigInteger("operating_unit_id")->nullable();
            $table->unsignedBigInteger('main_funding_source_id')->nullable();
            $table->unsignedBigInteger('funding_institution_id')->nullable();
            $table->unsignedBigInteger("implementation_mode_id")->nullable();
            $table->unsignedBigInteger("priority_ranking")->nullable();
            $table->unsignedBigInteger("project_status_id")->nullable();
            $table->boolean("infrastructure")->default(0)->nullable();
            $table->unsignedBigInteger("typology_id")->nullable();
            $table->unsignedBigInteger("tier_id")->nullable();
            $table->unsignedBigInteger("spatial_coverage_id")->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('city_municipality_id')->nullable();
            $table->text("cities_municipalities")->nullable();
            $table->text("description")->nullable();
            $table->text('components')->nullable();
            $table->text("goals")->nullable();
            $table->text('outcomes')->nullable();
            $table->text("purpose")->nullable();
            $table->text("expected_outputs")->nullable();
            $table->text("beneficiaries")->nullable();
            $table->text("employment_generated")->nullable();
            $table->bigInteger("target_start_year")->nullable();
            $table->bigInteger("target_end_year")->nullable();
            $table->date("implementation_start_date")->nullable();
            $table->date("implementation_end_date")->nullable();
            $table->decimal("total_project_cost",14,2)->default(0)->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->boolean('clearinghouse')->default(0)->nullable();
            $table->date('clearinghouse_date')->nullable();
            // from table cip_processing
            $table->boolean('has_row')->default(0)->nullable();
            $table->boolean('has_rap')->default(0)->nullable();
            $table->boolean('has_row_rap')->default(0)->nullable();

            $table->boolean('rdc_required')->default(0)->nullable();
            $table->boolean('rdc_endorsed')->default(0)->nullable();
            $table->date('rdc_endorsed_date')->nullable();
            $table->boolean('iccable')->default(0);
            $table->boolean('neda_submission')->default(0);
            $table->date('neda_submission_date')->nullable();
            $table->boolean('neda_secretariat_review')->default(0)->nullable();
            $table->date('neda_secretariat_review_date')->nullable();
            $table->boolean('icc_required')->default(0)->nullable();
            $table->boolean('icc_endorsed')->default(0)->nullable();
            $table->date('icc_endorsed_date')->nullable();
            $table->boolean('icc_approved')->default(0)->nullable();
            $table->date('icc_approved_date')->nullable();
            $table->boolean('neda_board')->default(0)->nullable();
            $table->date('neda_board_date')->nullable();

            $table->boolean('has_fs')->default(0)->nullable();
            $table->boolean('fs_assistance')->default(0)->nullable();
            $table->unsignedBigInteger('fs_status_id')->nullable();
            $table->date('fs_start_date')->nullable();
            $table->date('fs_end_date')->nullable();
            $table->decimal('fs_target_2017',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2018',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2019',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2020',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2021',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2022',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2023',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2024',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2025',14,2)->nullable()->default(0);
            $table->decimal('fs_target_total',14,2)->nullable()->default(0);
            // $table->text("status_update")->nullable(); // converted to one-to-many to accommodate multiple status updates
            // $table->unsignedBigInteger("readiness_id")->nullable();
            $table->text("updates")->nullable();
            $table->date("updates_date")->nullable();
            $table->text("implementation_risk")->nullable();
            $table->text("mitigation_strategy")->nullable();
            $table->text("income_increase")->nullable();
            $table->unsignedBigInteger('pdp_chapter_id')->nullable();
            $table->unsignedBigInteger('gad_id')->nullable();
            $table->decimal('row_target_2017',14,2)->nullable()->default(0);
            $table->decimal('row_target_2018',14,2)->nullable()->default(0);
            $table->decimal('row_target_2019',14,2)->nullable()->default(0);
            $table->decimal('row_target_2020',14,2)->nullable()->default(0);
            $table->decimal('row_target_2021',14,2)->nullable()->default(0);
            $table->decimal('row_target_2022',14,2)->nullable()->default(0);
            $table->decimal('row_target_2023',14,2)->nullable()->default(0);
            $table->decimal('row_target_2024',14,2)->nullable()->default(0);
            $table->decimal('row_target_2025',14,2)->nullable()->default(0);
            $table->decimal('row_target_total',14,2)->nullable()->default(0);
            $table->string('row_affected')->nullable();
            $table->decimal('rap_target_2017',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2018',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2019',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2020',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2021',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2022',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2023',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2024',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2025',14,2)->nullable()->default(0);
            $table->decimal('rap_target_total',14,2)->nullable()->default(0);
            $table->string('rap_affected')->nullable();
            $table->string("estimated_project_life")->nullable();
            $table->decimal("financial_benefit_cost_ratio",14,2)->nullable()->default(0);
            $table->decimal("financial_internal_rate_return",14,2)->nullable()->default(0);
            $table->decimal("financial_net_present_value",14,2)->nullable()->default(0);
            $table->decimal("economic_benefit_cost_ratio",14,2)->nullable()->default(0);
            $table->decimal("economic_internal_rate_return",14,2)->nullable()->default(0);
            $table->decimal("economic_net_present_value",14,2)->nullable()->default(0);
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
            $table->string('uacs_code')->nullable();
            $table->decimal('nep_2016',14,2)->nullable()->default(0);
            $table->decimal('nep_2017',14,2)->nullable()->default(0);
            $table->decimal('nep_2018',14,2)->nullable()->default(0);
            $table->decimal('nep_2019',14,2)->nullable()->default(0);
            $table->decimal('nep_2020',14,2)->nullable()->default(0);
            $table->decimal('nep_2021',14,2)->nullable()->default(0);
            $table->decimal('nep_2022',14,2)->nullable()->default(0);
            $table->decimal('nep_2023',14,2)->nullable()->default(0);
            $table->decimal('nep_2024',14,2)->nullable()->default(0);
            $table->decimal('nep_2025',14,2)->nullable()->default(0);
            $table->decimal('nep_total',14,2)->nullable()->default(0);
            $table->decimal('gaa_2016',14,2)->nullable()->default(0);
            $table->decimal('gaa_2017',14,2)->nullable()->default(0);
            $table->decimal('gaa_2018',14,2)->nullable()->default(0);
            $table->decimal('gaa_2019',14,2)->nullable()->default(0);
            $table->decimal('gaa_2020',14,2)->nullable()->default(0);
            $table->decimal('gaa_2021',14,2)->nullable()->default(0);
            $table->decimal('gaa_2022',14,2)->nullable()->default(0);
            $table->decimal('gaa_2023',14,2)->nullable()->default(0);
            $table->decimal('gaa_2024',14,2)->nullable()->default(0);
            $table->decimal('gaa_2025',14,2)->nullable()->default(0);
            $table->decimal('gaa_total',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2016',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2017',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2018',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2019',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2020',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2021',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2022',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2023',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2024',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2025',14,2)->nullable()->default(0);
            $table->decimal('disbursement_total',14,2)->nullable()->default(0);
            $table->text('image_url')->nullable();
            $table->unsignedBigInteger('project_preparation_document_id')->nullable();
            $table->string('project_preparation_document_others')->nullable();
            $table->unsignedBigInteger('technical_readiness_id')->nullable(); // equivalent of project preparation details
            $table->string('technical_readiness_others')->nullable();

            $table->unsignedBigInteger('submission_status_id')->nullable()->default(1);

            $table->unsignedBigInteger("created_by")->nullable();
            $table->unsignedBigInteger("updated_by")->nullable();

            $table->text('signed_copy')->nullable();
            $table->boolean('validation_data')->nullable();
            $table->boolean('validation_signed')->nullable();

            $table->boolean('finalized')->default(false)->nullable();
            $table->unsignedBigInteger('finalized_by')->nullable();
            $table->timestamp('finalized_at')->nullable();

            $table->boolean('endorsed')->nullable()->default(false);
            $table->unsignedBigInteger('endorsed_by')->nullable();
            $table->timestamp('endorsed_at')->nullable();

            $table->boolean('validated')->nullable()->default(false);
            $table->boolean('validated_by')->nullable();
            $table->timestamp('validated_at')->nullable();

            $table->boolean('reviewed')->nullable()->default(false);
            $table->boolean('approved')->nullable()->default(false);
            $table->boolean('encoded')->nullable()->default(false);

            $table->unsignedBigInteger('endorsement_id')->nullable();
            $table->unsignedBigInteger("deleted_by")->nullable();
            $table->unsignedBigInteger('version')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('prexc_program_id')->references('id')->on('prexc_programs')->onDelete('set null');
            // $table->foreign('prexc_subprogram_id')->references('id')->on('prexc_subprograms')->onDelete('set null');

            $table->unsignedBigInteger('processing_status_id')->nullable()->default(1);
            $table->unsignedBigInteger('processed_by')->nullable();

            $table->foreign('processing_status_id')->references('id')->on('processing_statuses')->onDelete('SET NULL');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('SET NULL');

            $table->foreign('cip_type_id')->references('id')->on('cip_types')->onDelete('set null');
            $table->foreign('pdp_chapter_id')->references('id')->on('pdp_chapters')->onDelete('set null');
            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('set null');
            $table->foreign('main_funding_source_id')->references('id')->on('funding_sources')->onDelete('set null');
            $table->foreign('funding_institution_id')->references('id')->on('funding_institutions')->onDelete('set null');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('tier_id')->references('id')->on('tiers')->onDelete('set null');
            $table->foreign('gad_id')->references('id')->on('gads')->onDelete('set null');
            $table->foreign('spatial_coverage_id')->references('id')->on('spatial_coverages')->onDelete('set null');
            $table->foreign('implementation_mode_id')->references('id')->on('implementation_modes')->onDelete('set null');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('endorsed_by')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('returned_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('reviewed_by')->references('id')->on('users');
            // $table->foreign('accepted_by')->references('id')->on('users');
            // $table->foreign('finalized_by')->references('id')->on('users');
            // $table->foreign('validated_by')->references('id')->on('users');
            // $table->foreign('endorsement_id')->references('id')->on('endorsements')->onDelete('set null');
            $table->foreign('technical_readiness_id')->references('id')->on('technical_readinesses')->onDelete('set null');
            $table->foreign('project_preparation_document_id')->references('id')->on('project_preparation_documents')->onDelete('set null');
            $table->foreign('submission_status_id')->references('id')->on('submission_statuses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
