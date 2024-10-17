<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // You can define fillable fields for mass assignment protection
    protected $fillable = [
        'title', 'isbn', 'author', 'published_at', // Example fields
    ];
}
