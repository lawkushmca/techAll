<?php
// database/migrations/{timestamp}_create_media_contents_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaContentsTable extends Migration
{
    public function up()
    {
        Schema::create('media_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('file_path');
            $table->string('type')->default('default');
            $table->boolean('visibility')->default(true);
            $table->boolean('is_default')->default(false);
            $table->string('page');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_contents');
    }
}
