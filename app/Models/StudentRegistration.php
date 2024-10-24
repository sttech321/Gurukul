<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'gurukulid',
        'std_class',
        'name',
        'email',
        'password',
        'role',
        'father_name',
        'mother_name',
        'date_of_birth',
        'aadhaar_card',
        'home_address',
        'father_dob',
        'father_aadhaar_card',
        'father_address',
        'father_mobile_number',
        'father_profession',
        'mother_dob',
        'mother_aadhaar_card',
        'mother_address',
        'mother_mobile_number',
        'mother_profession',
        'teacherid',
    ];
    
}
