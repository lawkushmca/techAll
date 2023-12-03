<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->timestamp('start_date', 0)->nullable(false);
            $table->timestamp('end_date', 0)->nullable(false);
            $table->string('link', 255)->nullable();
            $table->timestamps(0); // Use 0 to specify TIMESTAMP(0) WITHOUT TIME ZONE
            $table->jsonb('participants');
            $table->text('additional_participant')->nullable();
            $table->string('status', 32);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
