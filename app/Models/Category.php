<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'parent_id',
        'order',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Parent Category Relationship (for nested categories).
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Subcategories Relationship.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
