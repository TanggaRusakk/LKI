<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    /**
     * Get reviews for this service.
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
