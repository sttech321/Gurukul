<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GurukulRegistration extends Model
{
    use HasFactory;

    // Specify the table name if it does not follow Laravel's naming convention (plural)
    protected $table = 'gurukul_registrations'; // This is optional if your table name is 'gurukul_registrations'

    // Define fillable fields
    protected $fillable = [
        'gurukul_name',
        'address',
        'mobile_number',
        'trust_name',
        'trust_registration_date',
        'trust_president_name',
        'secretary_name',
        'treasurer_name',
        'principal_name',
        'education_board_support',
        'government_support',
        'private_donations',
        'donations_from_temples_and_mathas',
        'setup_type',
        'focus_area',
        'registered_with_education_board',
        'education_board_name',
        'facilities',
    ];

    // public $timestamps = false;
}
