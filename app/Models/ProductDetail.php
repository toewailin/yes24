<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'attribute_name',
        'attribute_value',
        'is_visible',
        'display_order',
    ];

    /**
     * Relationship to the Item model.
     */
    public function item()
    {
        return $this->belongsTo(Product::class);
    }
}
