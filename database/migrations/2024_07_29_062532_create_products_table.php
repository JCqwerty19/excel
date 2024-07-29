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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->string('uuid');
            $table->string('type');
            $table->string('code');
            $table->string('name');
            $table->string('external_code');
            $table->string('article')->nullable();
            $table->string('unit');
            $table->string('price');
            $table->string('currency');
            $table->string('internalPrice');
            $table->string('internalCurrency');
            $table->string('ean13_code');
            $table->string('ean8_code')->nullable();
            $table->string('code128')->nullable();
            $table->string('upc_code')->nullable();
            $table->string('gtin_code')->nullable();
            $table->text('description');
            $table->string('indication');
            $table->boolean('discount');
            $table->string('min_price');
            $table->string('min_price_currency');
            $table->string('country');
            $table->string('vat');
            $table->string('supplier');
            $table->boolean('archieved');
            $table->string('weight');
            $table->boolean('weight_product');
            $table->boolean('marked');
            $table->string('volume');
            $table->boolean('excise');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
