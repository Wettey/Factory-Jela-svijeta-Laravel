<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_meals', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('ingredient_id');
            $table->foreignId('meal_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ingredient_id')->on('ingredients')->references('id')->onDelete('cascade');
            $table->foreign('meal_id')->on('meals')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_meals');
    }
}
