<?php

namespace App\Http\Controllers;

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
}
