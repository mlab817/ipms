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
        Schema::create('project_ou_investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('ref_operating_unit_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->decimal('y2022', 20)->nullable()->default(0);
            $table->decimal('y2023', 20)->nullable()->default(0);
            $table->decimal('y2024', 20)->nullable()->default(0);
            $table->decimal('y2025', 20)->nullable()->default(0);
            $table->decimal('y2026', 20)->nullable()->default(0);
            $table->decimal('y2027', 20)->nullable()->default(0);
            $table->decimal('y2028', 20)->nullable()->default(0);
            $table->decimal('y2029', 20)->nullable()->default(0);
            $table->decimal('y2030', 20)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_ou_investments');
    }
};
