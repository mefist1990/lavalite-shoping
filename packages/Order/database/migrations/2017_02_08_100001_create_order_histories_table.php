<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderHistoriesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: order_histories
         */
        Schema::create('order_histories', function ($table) {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->integer('order_status_id')->nullable();
            $table->tinyInteger('notify')->nullable();
            $table->text('comment')->nullable();
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
        Schema::drop('order_histories');
    }
}
