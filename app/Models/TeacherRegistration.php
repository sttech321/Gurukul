<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherRegistration extends Model
{
    use HasFactory;

    protected $table = 'teacher_registration';

    // Define the fillable fields
    protected $fillable = [
        'gurukulid',
        'name',
        'father_name',
        'mother_name',
        'surname',
        'date_of_birth',
        'gotra',
        'varna',
        'aadhaar_card',
        'home_address',
        'mobile_number',
        'guru_name',
        'ved_shakha',
        'extra_ordinary_skills',
        'exceptional_abilities',
        'modern_education_qualifications'
    ];
}
