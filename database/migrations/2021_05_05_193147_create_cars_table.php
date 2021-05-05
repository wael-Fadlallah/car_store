<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->nullable();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('price');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('type');
            $table->string('age');
            $table->string('kilometer');
            $table->string('status');
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
        Schema::dropIfExists('cars');
    }
}
