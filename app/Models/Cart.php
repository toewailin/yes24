<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'price',
    ];

    /**
     * Relationships
     */

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Accessors
     */

    // Total price for this cart item
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }
}
