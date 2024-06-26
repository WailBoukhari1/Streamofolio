<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('payment_method');
            $table->timestamp('order_date');
            $table->timestamp('possible_shipping_date');
            $table->timestamp('possible_delivery_date');
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('stripe_session_id')->nullable();
            $table->decimal('total_price_after_discount', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
