<?php

//Fertige Drohnen
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('drones', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('image1')->default('');
          $table->string('image2')->default('');
          $table->string('image3')->default('');
          $table->string('image4')->default('');
          $table->string('description')->default('');
          $table->string('description_long')->default('');
          $table->timestamps();
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('drones');
  }
}
