<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('author_id');
            $table->unsignedTinyInteger('publisher_id');
            $table->string('name')->index();
            $table->string('slug');
            $table->text('description');
            $table->float('price');
            $table->integer('discount');
            $table->boolean('status');
            $table->string('photo');
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedTinyInteger('category_id');
            $table->unique(['product_id', 'category_id']);
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
