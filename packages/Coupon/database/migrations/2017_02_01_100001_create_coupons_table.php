<?php

use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: coupons
         */
        Schema::create('coupons', function ($table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('description', 225)->nullable();
            $table->string('code', 255)->nullable();
            $table->enum('type', ['Percentage',=>'Percentage','Fixed Amount'=>'Fixed Amount'])->nullable();
            $table->decimal('discount', 50)->nullable();
            $table->enum('logged', ['Yes','No'])->nullable();
            $table->enum('shipping', ['Yes','No'])->nullable();
            $table->decimal('total', 50)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('uses_total')->nullable();
            $table->string('uses_customer', 11)->nullable();
            $table->enum('status', ['Enabled'=>'Enabled','Disabled'=>'Disabled'])->nullable();
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
        Schema::drop('coupons');
    }
}
