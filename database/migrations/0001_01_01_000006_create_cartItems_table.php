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
        Schema::create('cart_Items',function (Blueprint $table){
            $table->id();
            $table->integer('amount');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->
            on('cart')->onDelete('cascade');
            $table->string('productName');
            $table->foreign('productName')->references('name')->
            on('products')->onDelete('cascade');
        });


    }


    public function down(): void
    {

    }
};
