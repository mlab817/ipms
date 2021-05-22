<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('extension')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->text('dropbox_path')->nullable();
            $table->text('dropbox_link')->nullable();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
