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
        Schema::create('purchasing', function (Blueprint $table) {
            $table->string('purchase_id', 50)->primary();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->string('address');
            $table->integer('status_order');
            $table->integer('total_purchase');
            $table->integer('total_payment');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing');
    }
};
