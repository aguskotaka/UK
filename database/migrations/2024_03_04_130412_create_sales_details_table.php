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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sale');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('total_product');
            $table->unsignedBigInteger('sub_total');
            $table->timestamps();
            $table->foreign('id_sale')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_details');
    }
};
