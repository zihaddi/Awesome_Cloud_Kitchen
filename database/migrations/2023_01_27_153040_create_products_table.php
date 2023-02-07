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
            $table->unsignedBigInteger('caid')->nullable();
            $table->unsignedBigInteger('vid')->nullable();
            $table->string('sku')->nullable();
            $table->string('name');
            $table->string('image');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->integer('buyingPrice');
            $table->integer('sellingPrice');
            $table->integer('discount')->nullable();
            $table->integer('ranking')->nullable();
            $table->foreign('caid')->references('id')->on('categories');
            $table->foreign('vid')->references('id')->on('users');
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
