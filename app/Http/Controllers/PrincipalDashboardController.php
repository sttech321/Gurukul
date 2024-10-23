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

    // view page of the teacher registration
    public function teacher_registration_page()
    {
        $gurukuls = GurukulRegistration::all();
        $teacher = TeacherRegistration::all();
        return view('layouts.principal.teacher_registrations', compact('teacher', 'gurukuls'));
    }
}
