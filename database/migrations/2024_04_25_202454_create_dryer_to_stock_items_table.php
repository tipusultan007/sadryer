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
        Schema::create('dryer_to_stock_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dryer_to_stock_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->nullable();
            $table->integer('weight')->nullable();
            $table->enum('type',[
                'rice',
                'khudi' ,
                'tamri',
                'tush',
                'dryer_kura',
                'silky_kura',
                'bali'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dryer_to_stock_items');
    }
};
