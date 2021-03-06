<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//Artikel (Einzelteile)
class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category');
            $table->string('name');
            $table->string('image')->default('');
            $table->string('description')->default('');
            $table->text('description_long');
            $table->float('weight', 8, 2)->default(0);
            $table->float('length', 8, 2)->default(0);
            $table->float('width', 8, 2)->default(0);
            $table->float('height', 8, 2)->default(0);
            $table->float('diameter', 8, 2)->default(0);
            $table->float('price', 8, 2)->default(0);
            $table->timestamps();
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
