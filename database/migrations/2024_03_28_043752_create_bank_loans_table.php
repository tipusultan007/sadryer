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
        Schema::create('bank_loans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('loan_amount');
            $table->decimal('interest', 10, 2);
            $table->float('duration');
            $table->decimal('total_loan',12,2)->nullable();
            $table->decimal('grace',10,2)->nullable();
            $table->date('date');
            $table->date('expire')->nullable();
            $table->string('trx_id');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_loans');
    }
};
