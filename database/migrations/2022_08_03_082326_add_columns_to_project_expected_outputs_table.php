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
        Schema::table('project_expected_outputs', function (Blueprint $table) {
            $table->decimal('target', 12, 0)->nullable()->default(0);
            $table->foreignId('ref_output_indicator_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_expected_outputs', function (Blueprint $table) {
            $table->dropColumn('target','ref_output_indicator_id');
        });
    }
};
