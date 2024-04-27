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
        Schema::create('dryers', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('dryer_no');
            $table->integer('weight')->nullable();
            $table->float('quantity')->nullable();
            $table->date('date');
            $table->enum('status',['active','completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dryers');
    }
};
