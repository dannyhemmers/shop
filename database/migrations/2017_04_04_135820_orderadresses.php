<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderadresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('orderadresses', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedInteger('order_id');
             $table->string('country');
             $table->string('name');
             $table->string('street');
             $table->string('additional');
             $table->string('postal');
             $table->string('city');
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('orderadresses');
     }
}
