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
        Schema::create('dryer_to_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dryer_id');
            $table->integer('rice')->nullable();
            $table->integer('dryer_kura')->nullable();
            $table->integer('silky_kura')->nullable();
            $table->integer('khudi')->nullable();
            $table->integer('tamri')->nullable();
            $table->integer('tush')->nullable();
            $table->integer('bali')->nullable();
            $table->integer('wastage')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dryer_to_stocks');
    }
};
