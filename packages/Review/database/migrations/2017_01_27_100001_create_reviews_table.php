<?php

use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: reviews
         */
        Schema::create('reviews', function ($table) {
            $table->increments('id');
            $table->integer('product_id')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['Publish'=>'Publish','Unpublish'=>'Unpublish'])->nullable();
            $table->string('score', 256)->nullable();
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
        Schema::drop('reviews');
    }
}
