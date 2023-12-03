<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamps(0); // Use 0 to specify TIMESTAMP(0) WITHOUT TIME ZONE
        });

        // Add foreign key
        Schema::table('members', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Add unique constraint
        $table->unique('user_id', 'employees_user_id_unique');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
