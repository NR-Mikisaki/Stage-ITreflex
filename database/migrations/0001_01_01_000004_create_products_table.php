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
        Schema::create('products',function (Blueprint $table){
            $table->id();
            $table->string('name')->index();
            $table->double('price');
            $table->string('imagesrc');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->
            on('subcategories')->onDelete('cascade');
        });


    }


    public function down(): void
    {
        Schema::dropIfExists('products');

    }
};
