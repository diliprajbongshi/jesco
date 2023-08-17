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
        Schema::create('order_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cart_total');
            $table->string('coupon_name')->nullable();
            $table->integer('discount_total')->default(0);
            $table->integer('sub_total');
            $table->integer('grand_total');
            $table->integer('shipping');
            $table->integer('payment_option');
            $table->integer('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_summaries');
    }
};
