<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'price',
        'subtotal',
    ];

    /**
     * Relationships
     */

    // Order relationship
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Item relationship
    public function item()
    {
        return $this->belongsTo(Product::class);
    }
}
