<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cartItems',function (Blueprint $table){
            $table->id();
            $table->integer('amount');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->
            on('Products')->onDelete('cascade');
        });


    }


    public function down(): void
    {
        Schema::dropIfExists('cartItems');

    }
};
