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
        Schema::create('purchasing_details', function (Blueprint $table) {
            $table->string('detail_id', 255)->primary();
            $table->string('med_id', 50);
            $table->string('purchase_id', 50);
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total_price');
            $table->string('rating', 45);
            $table->foreign('med_id')->references('med_id')->on('medicines')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('purchase_id')->references('purchase_id')->on('purchasing')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing_details');
    }
};
