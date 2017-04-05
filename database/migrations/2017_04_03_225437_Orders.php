<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('orders', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedInteger('user_id');
             $table->string('email');
             $table->float('totalprice', 8, 2)->default(0);
             $table->timestamps();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('orders');
     }
}
