<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('Clothing', function (Blueprint $table) {
            $table->id();
            $table->string('Type');
        });
        Schema::create('Accessories', function (Blueprint $table) {
            $table->id();
            $table->string('Type');
        });
        Schema::create('Brands', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
        });
    }


    public function down(): void
    {
        Schema::drop('Clothing');
        Schema::drop('Accessories');
        Schema::drop('Brands');
    }

};
