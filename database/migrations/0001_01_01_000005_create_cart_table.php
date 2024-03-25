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
        Schema::create('cart',function (Blueprint $table){
            $table->id();
            $table->double('totalPrice');
        });

    }


    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
        });

        // Drop the cart_items table
        Schema::dropIfExists('cart_items');

        // Drop the cart table
        Schema::dropIfExists('cart');

    }
};
