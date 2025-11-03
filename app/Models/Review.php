<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
    
    private $name;
    private $description;
    private $image;
    private $price;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];
}
