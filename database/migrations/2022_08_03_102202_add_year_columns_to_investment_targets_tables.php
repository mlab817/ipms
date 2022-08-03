<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'project_resettlement_action_plans',
            'project_right_of_ways',
            'project_feasibility_studies',
            'project_neps',
            'project_allocations',
            'project_disbursements',
        ];

        foreach ($tables as $item) {
            Schema::table($item, function (Blueprint $table) {
                $table->decimal('y2026', 20)->nullable()->default(0);
                $table->decimal('y2027', 20)->nullable()->default(0);
                $table->decimal('y2028', 20)->nullable()->default(0);
                $table->decimal('y2029', 20)->nullable()->default(0);
                $table->decimal('y2030', 20)->nullable()->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investment_targets_tables', function (Blueprint $table) {
            //
        });
    }
};
