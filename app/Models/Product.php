<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'sub_category',
        'short_description',
        'full_description',
        'fabric',
        'color',
        'color_code',
        'occasion',
        'price',
        'mrp',
        'discount',
        'stock_quantity',
        'availability',
        'is_featured',
        'is_new_arrival',
        'is_bestseller',
        'rating',
        'review_count',
        'main_image',
        'gallery_images',
        'sizes',
        'product_benefits',
        'product_specifications',
        'care_instructions',
        'shipping_info',
        'return_info',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'mrp' => 'decimal:2',
        'discount' => 'integer',
        'stock_quantity' => 'integer',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
        'is_bestseller' => 'boolean',
        'rating' => 'decimal:2',
        'review_count' => 'integer',
        'gallery_images' => 'array',
        'sizes' => 'array',
        'product_benefits' => 'array',
        'product_specifications' => 'array',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order', 'asc');
    }

    public function scopePublished($query)
    {
        return $query->where(function($q) {
            $q->where('status', 'published')
              ->orWhere('status', '1')
              ->orWhere('status', 1);
        });
    }

    public function getMainImageUrlAttribute(): string
    {
        if ($this->main_image) {
            if (str_starts_with($this->main_image, 'http') || str_starts_with($this->main_image, 'assets/') || str_starts_with($this->main_image, 'img/')) {
                return asset($this->main_image);
            }
            return asset('storage/' . $this->main_image);
        }
        return asset('assets/img/card_pink.jpg');
    }

    public function getFormattedPriceAttribute(): string
    {
        return '₹' . number_format($this->price, 0);
    }

    public function getFormattedMrpAttribute(): string
    {
        return $this->mrp ? '₹' . number_format($this->mrp, 0) : '';
    }
}
