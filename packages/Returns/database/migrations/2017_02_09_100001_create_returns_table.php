<?php

use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: returns
         */
        Schema::create('returns', function ($table) {
            $table->increments('id');
            $table->integer('return_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('return_reason_id')->nullable();
            $table->integer('return_action_id')->nullable();
            $table->integer('return_status_id')->nullable();
            $table->text('comment')->nullable();
            $table->date('date_ordered')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_modified')->nullable();
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
        Schema::drop('returns');
    }
}
