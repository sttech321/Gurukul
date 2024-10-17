<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PrincipalDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/principal'); // Pass the principal variable to the view
    }
}
