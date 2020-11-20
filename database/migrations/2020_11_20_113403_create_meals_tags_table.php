<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals_tags', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('meal_id');
            $table->foreignId('tag_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('meal_id')->on('meals')->references('id')->onDelete('cascade');
            $table->foreign('tag_id')->on('tags')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals_tags');
    }
}
