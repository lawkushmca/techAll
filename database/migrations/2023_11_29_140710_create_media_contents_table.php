<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('file_path', 255);
            $table->string('type', 255)->default('default');
            $table->boolean('status')->default(true);
            $table->boolean('is_default')->default(false);
            $table->string('page', 255)->nullable();
            $table->timestamps(0); // Use 0 to specify TIMESTAMP(0) WITHOUT TIME ZONE
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_contents');
    }
}
