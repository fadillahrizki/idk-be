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
        Schema::create('sell_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date')->nullable();
            $table->string('customer_name')->nullable();
            $table->boolean('is_cancelled')->nullable();
            $table->date('cancelled_at')->nullable();
            $table->boolean('is_printed')->nullable();
            $table->date('printed_at')->nullable();
            $table->integer('sub_total')->nullable();
            $table->integer('disc_amount')->nullable();
            $table->integer('grand_total')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_transactions');
    }
};
