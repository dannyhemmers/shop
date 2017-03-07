<?php

//Drohne besteht aus x Artikeln
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Droneconsistsof extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('droneconsistsof', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('drone_id');
          $table->unsignedInteger('article_id');
          $table->foreign('drone_id')->references('id')->on('drones')->onDelete('cascade');
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
      Schema::drop('droneconsistsof');
  }
}
