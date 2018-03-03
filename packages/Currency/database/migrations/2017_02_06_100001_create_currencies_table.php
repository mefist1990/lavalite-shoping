<?php

use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: currencies
         */
        Schema::create('currencies', function ($table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('code', 255)->nullable();
            $table->string('symbol_left', 255)->nullable();
            $table->string('symbol_right', 255)->nullable();
            $table->char('decimal_place', 1)->nullable();
            $table->float('value')->nullable();
            $table->enum('status', ['Hide'=>'Hide','Show'=>'Show'])->nullable();
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
        Schema::drop('currencies');
    }
}
