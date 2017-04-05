<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('orderdetails', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedInteger('order_id');
             $table->unsignedInteger('article_id');
             $table->String('name');
             $table->unsignedInteger('amount');
             $table->float('price', 8, 2)->default(0);
             $table->timestamps();
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
             $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('orderdetails');
     }
}
