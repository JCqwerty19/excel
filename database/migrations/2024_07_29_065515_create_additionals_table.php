<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unique();
            $table->string('size');
            $table->string('colour');
            $table->string('brand');
            $table->string('structure');
            $table->string('quantityInBox')->nullable();
            $table->string('boxLink');
            $table->string('title');
            $table->string('h1')->nullable();
            $table->string('desctiption');
            $table->unsignedBigInteger('weight');
            $table->unsignedBigInteger('width');
            $table->unsignedBigInteger('height');
            $table->unsignedBigInteger('lenght');
            $table->unsignedBigInteger('boxWeight');
            $table->unsignedBigInteger('boxWidth');
            $table->unsignedBigInteger('boxHeight');
            $table->unsignedBigInteger('boxLenght');
            $table->string('category');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additionals');
    }
};
