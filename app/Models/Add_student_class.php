<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_student_class extends Model
{
    use HasFactory;

    protected $table = 'add_student_class';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'std_classes', // Add other fields as needed
    ];
}
