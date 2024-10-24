<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\Add_student_class;
use App\Models\Book;
use App\Models\User;
use App\Models\BookIssue;
use App\Models\GurukulRegistration;
use App\Models\TeacherRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PrincipalDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/principal'); // Pass the principal variable to the view
    }

    public function teacher_registration_page()
    {
        $title = 'Teacher Registration';
        // Retrieve the logged-in user's ID
        $userId = auth()->user()->common_id;
        // Fetch the Gurukul details where 'id' matches the logged-in user's ID
        $gurukuls = GurukulRegistration::where('id', $userId)->first(); // Use first() to get a single record
        if (!$gurukuls) {
            $gurukuls = null;
        }
        $teacher = TeacherRegistration::where('gurukulid', $userId)->paginate(env('PAGINATION_LIMIT'));
        // Return view with the data
        return view('layouts.principal.teacher_registrations', compact('teacher', 'gurukuls', 'title'));
    }
    


    // view page of the student registration
    public function student_registration_page()
    {   
        $title = 'Student Registration';
        $userId = auth()->user()->common_id;
        $paginationLimit = env('PAGINATION_LIMIT'); // Get limit from .env, default to 10
        $Add_student_class = Add_student_class::all(); // This can remain with all()
        $gurukuls = GurukulRegistration::where('id', $userId)->first();  // This can remain with all()
        if (!$gurukuls) {
            $gurukuls = null;
        }
        $student = StudentRegistration::where('gurukulid', $userId)->paginate(env('PAGINATION_LIMIT')); // Use paginate() instead of all()
        return view('layouts/principal/student_registration', compact('student', 'gurukuls', 'Add_student_class', 'title'));
    }
}

