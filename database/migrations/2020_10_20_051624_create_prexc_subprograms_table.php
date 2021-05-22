<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrexcSubprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prexc_subprograms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('acronym')->nullable();
            $table->string('uacs_code')->nullable();
            $table->unsignedBigInteger('prexc_program_id')->nullable();
            $table->string('title')->nullable();
            $table->text('organizational_outcome')->nullable();
            $table->text('objective_statement')->nullable();
            $table->text('program_strategy')->nullable();
            $table->text('outcome_indicators')->nullable();
            $table->text('output_indicators')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('prexc_program_id')->references('id')->on('prexc_programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prexc_subprograms');
    }
}
