<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wood extends Model
{
    /** @use HasFactory<\Database\Factories\WoodFactory> */
    use HasFactory;

    private $name;
    private $origin;
    private $description;
    private $characteristics;
    private $uses;
    private $image;

    protected $fillable = [
        'name',
        'origin',
        'description',
        'characteristics',
        'uses',
        'image'
    ];
}
