<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('operating_unit_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->text('avatar')->nullable();
            $table->string('contact_number')->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
