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
        // check if database has a table or not
        if (Schema::hasTable('audit_logs')) {
            echo 'Skipped loading sql file because database is not empty';
        } else {
            if ($source = file_get_contents(database_path('backups/tcbaqdyf_official.sql'))) {
                \Illuminate\Support\Facades\DB::unprepared($source);
            }
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
