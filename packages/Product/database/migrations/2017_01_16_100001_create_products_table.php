<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: products
         */
        Schema::create('products', function ($table) {
            $table->increments('id');
            $table->text('model')->nullable();
            $table->text('download')->nullable();
            $table->longText('related_products')->nullable();
            $table->longText('name')->nullable();
            $table->float('price')->nullable();
            $table->enum('status', ['enabled','disabled'])->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('description')->nullable();
            $table->longText('return_policy')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('tags')->nullable();
            $table->text('image')->nullable();
            $table->string('sku', 64)->nullable();
            $table->string('upc', 64)->nullable();
            $table->string('ean', 64)->nullable();
            $table->string('jan', 64)->nullable();
            $table->string('isbn', 64)->nullable();
            $table->string('mpn', 46)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('tax_class', 30)->nullable();
            $table->enum('substract_stock', ['yes','no'])->nullable();
            $table->enum('outofstock_status', ['in stock','out of stock','pre-order'])->nullable();
            $table->text('seo_keyword')->nullable();
            $table->integer('order')->nullable();
            $table->text('dimensions')->nullable();
            $table->enum('weight_class', ['kilogram','gram','pound','ounce'])->nullable();
            $table->enum('length_class', ['centimeter','millimeter','inch'])->nullable();
            $table->dateTime('date_available')->nullable();
            $table->text('manufacturer')->nullable();
            $table->text('attributes')->nullable();
            $table->text('discounts')->nullable();
            $table->text('special')->nullable();
            $table->text('images')->nullable();
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
        Schema::drop('products');
    }
}
