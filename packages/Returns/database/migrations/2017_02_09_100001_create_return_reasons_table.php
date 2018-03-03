<?php

use Illuminate\Database\Migrations\Migration;

class CreateReturnReasonsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: return_reasons
         */
        Schema::create('return_reasons', function ($table) {
            $table->increments('id');
            $table->integer('return_reason_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->string('name', 128)->nullable();
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
        Schema::drop('return_reasons');
    }
}
