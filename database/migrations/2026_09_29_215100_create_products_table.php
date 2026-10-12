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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('sku')->nullable()->unique();
                $table->string('sub_category')->nullable();
                $table->text('short_description')->nullable();
                $table->longText('full_description')->nullable();
                $table->string('fabric')->nullable();
                $table->string('color')->nullable();
                $table->string('color_code')->nullable();
                $table->string('occasion')->nullable();
                $table->decimal('price', 10, 2);
                $table->decimal('mrp', 10, 2)->nullable();
                $table->integer('discount')->default(0);
                $table->integer('stock_quantity')->default(10);
                $table->string('availability')->default('in_stock');
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_new_arrival')->default(false);
                $table->boolean('is_bestseller')->default(false);
                $table->decimal('rating', 3, 2)->default(5.00);
                $table->integer('review_count')->default(1);
                $table->string('main_image')->nullable();
                $table->json('gallery_images')->nullable();
                $table->json('sizes')->nullable();
                $table->json('product_benefits')->nullable();
                $table->json('product_specifications')->nullable();
                $table->text('care_instructions')->nullable();
                $table->text('shipping_info')->nullable();
                $table->text('return_info')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('meta_keywords')->nullable();
                $table->string('canonical_url')->nullable();
                $table->string('status')->default('published');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
