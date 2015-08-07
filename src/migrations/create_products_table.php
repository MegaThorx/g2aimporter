<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
             $table->string('name');
             $table->string('type');
             $table->boolean('preOrder');
             $table->string('slug');
             $table->string('addUrl');
             $table->decimal('minPrice',10,2);
             $table->integer('g2aQty');
             $table->decimal('g2aPrice');
             $table->integer('retialQty');
             $table->decimal('retialPrice',10,2);
             $table->integer('retialAuction');
             $table->integer('selectedAuction');
             $table->integer('wholesaleQty');
             $table->decimal('wholesaleMinPrice',10,2);
             $table->integer('requestedQty');
             $table->decimal('requestedMaxPrice',10,2);
             $table->string('smallImage');
             $table->string('mobileImage');
             $table->string('icons');
             $table->decimal('specialPrice',10,2);
             $table->dateTime('specialPriceStart');
             $table->integer('lastAuction');
             $table->string('feeCurrencies');
             $table->string('releaseDate');
             $table->dateTime('created_at');
             $table->dateTime('updated_at');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('products');
     }
}
