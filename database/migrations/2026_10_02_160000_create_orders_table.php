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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_number')->unique();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                
                // Customer Details
                $table->string('customer_name');
                $table->string('customer_email');
                $table->string('customer_phone');
                
                // Shipping Address
                $table->text('shipping_address');
                $table->string('city');
                $table->string('state');
                $table->string('pincode');
                $table->string('country')->default('India');
                
                // Pricing Breakdown
                $table->decimal('subtotal', 10, 2);
                $table->decimal('shipping_amount', 10, 2)->default(0.00);
                $table->decimal('discount_amount', 10, 2)->default(0.00);
                $table->decimal('total_amount', 10, 2);
                $table->string('currency', 10)->default('INR');
                
                // Status Tracking
                $table->string('payment_method')->default('razorpay');
                $table->string('payment_status')->default('pending'); // pending, paid, failed
                $table->string('order_status')->default('new'); // new, processing, shipped, delivered, cancelled
                
                // Razorpay Reference Details
                $table->string('razorpay_order_id')->nullable()->index();
                $table->string('razorpay_payment_id')->nullable()->index();
                $table->text('razorpay_signature')->nullable();
                
                $table->text('customer_notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
