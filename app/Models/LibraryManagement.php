<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryManagement extends Model
{
    use HasFactory;
    protected $table = 'libraries';

    protected $fillable = [
        'book_title', 'author_name', 'total_copies', 'available_copies', 'issued_date', 'return_date', 'is_overdue',
    ];
}
