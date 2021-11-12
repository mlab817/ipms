<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefValidationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_validation_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color', 7)->nullable(); // hex code
            $table->timestamps();
        });

        DB::table('ref_validation_statuses')->insert([
            [
                'name'  => 'Reviewed',
                'color' => '#2e86f4',
            ],
            [
                'name' => 'Validated',
                'color' => '#2da44e',
            ],
            [
                'name' => 'Uncategorized',
                'color' => '#e34c26',
            ],
            [
                'name' => 'For deletion',
                'color' => '#d73a4a',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_validation_statuses');
    }
}
