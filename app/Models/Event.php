<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'image',
        'is_active',
    ];

    /**
     * Scope for active events.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Accessor for formatted start date.
     */
    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('F j, Y, g:i a');
    }

    /**
     * Accessor for formatted end date.
     */
    public function getFormattedEndDateAttribute()
    {
        return $this->end_date->format('F j, Y, g:i a');
    }
}
