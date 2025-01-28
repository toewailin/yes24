<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'category_id',
    ];

    protected $table = 'subcategories';

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships

    /**
     * Parent Category Relationship.
     * A subcategory belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Items Relationship.
     * A subcategory may have multiple items.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
