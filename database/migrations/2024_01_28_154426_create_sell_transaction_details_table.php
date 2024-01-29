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
        Schema::create('sell_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sell_transaction_id');
            $table->foreignId('product_id');
            $table->foreignId('uom_id');
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('disc_1')->nullable();
            $table->integer('disc_2')->nullable();
            $table->integer('disc_amount')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_transaction_details');
    }
};
