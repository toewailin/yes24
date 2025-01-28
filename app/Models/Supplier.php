<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_email',
        'contact_phone',
        'address',
        'description',
    ];

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
