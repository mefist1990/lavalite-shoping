<?php

use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: carts
         */
        Schema::create('carts', function ($table) {
            $table->increments('id');
            $table->string('identifier', 255)->nullable();
            $table->string('instance', 255)->nullable();
            $table->longText('content')->nullable();
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
        Schema::drop('carts');
    }
}
