<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrexcProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prexc_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('acronym')->nullable();
            $table->string('uacs_code')->nullable();
            $table->unsignedBigInteger('cost_structure_id')->nullable();
            $table->string('title')->nullable();
            $table->text('organizational_outcome')->nullable();
            $table->text('objective_statement')->nullable();
            $table->text('program_strategy')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cost_structure_id')->references('id')->on('cost_structures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prexc_programs');
    }
}
