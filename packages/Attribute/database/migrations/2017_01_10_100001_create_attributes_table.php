<?php

use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: attributes
         */
        Schema::create('attributes', function ($table) {
            $table->increments('id');
            $table->integer('group_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->integer('order')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['draft', 'complete', 'verify', 'approve', 'publish', 'unpublish', 'archive'])->default('draft')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type',50)->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('attributes');
    }
}
