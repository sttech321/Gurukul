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

class TeacherDashboardController extends Controller
{
    /**
     * Display the teacher dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard/teacher');
    }

    // view page of the student registration
    public function student_registration_page()
    {   
        $title = 'Student Registration';
        $paginationLimit = env('PAGINATION_LIMIT'); // Get limit from .env, default to 10
        $Add_student_class = Add_student_class::all(); // This can remain with all()
        $gurukuls = GurukulRegistration::all(); // This can remain with all()
        $student = StudentRegistration::paginate($paginationLimit); // Use paginate() instead of all()
        return view('layouts/teacher/student_registration', compact('student', 'gurukuls', 'Add_student_class', 'title'));
    }
}