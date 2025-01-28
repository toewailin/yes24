<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'is_active',
        'order',
    ];

    /**
     * Accessor for Active Status.
     */
    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
