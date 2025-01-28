<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sku',
        'is_active',
        'category_id',
        'subcategory_id',
        'supplier_id',
        'artist_id',
        'image',
        'additional_images',
        'attributes',
        'discount',
        'tax',
        'slug',
        'meta_title',
        'meta_description',
        'views',
        'sales',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
        'additional_images' => 'array',
        'attributes' => 'array',
        'discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'views' => 'integer',
        'sales' => 'integer',
    ];

    /**
     * Relationships
     */

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Subcategory relationship
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // Supplier relationship
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Artist relationship
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    // Order items relationship
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Accessors & Mutators
     */

    // Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Mutator for slug
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    /**
     * Scopes
     */

    // Scope for active items
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for filtering by category
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Scope for filtering by price range
    public function scopeByPriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function details()
    {
        return $this->hasMany(ItemDetail::class);
    }

}
