<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\PrincipalDashboardController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        if ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->role === 'principal') {
            return redirect()->route('principal.dashboard');
        }elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }
    return redirect('/login');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouping dashboard routes with authentication and role middleware
Route::get('/dashboard/principal', [PrincipalDashboardController::class, 'index'])->name('principal.dashboard')->middleware('role:principal');

Route::get('/dashboard/teacher', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard')->middleware('role:teacher');

Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/inventory_management', [AdminDashboardController::class, 'inventory_management'])->name('inventory.registration');
Route::get('/student_registration', [AdminDashboardController::class, 'student_registration'])->name('student.registration');
Route::get('/gurukul_registration_page', [AdminDashboardController::class, 'gurukul_registration_page'])->name('gurukul.registration');
Route::get('/gurukul/{id}/edit', [AdminDashboardController::class, 'edit'])->name('gurukul.edit');
Route::post('/gurukul/{id}/update', [AdminDashboardController::class, 'update'])->name('gurukul.update');
Route::delete('/gurukul/{id}', [AdminDashboardController::class, 'destroy'])->name('gurukul.destroy');
Route::post('/gurukul/register', [AdminDashboardController::class, 'store'])->name('gurukul.register');

Route::post('/teacher-registration', [AdminDashboardController::class, 'storing_teacher_registration_data'])->name('teacher.registration.store');
Route::get('/teacher_registration', [AdminDashboardController::class, 'teacher_registration'])->name('teacher.registration');
Route::delete('/teacher/{id}', [AdminDashboardController::class, 'destroyteachertable'])->name('teacher.destroy');
Route::get('/teacher/{id}/edit', [AdminDashboardController::class, 'teacheredit'])->name('teacher.edit');
Route::post('/teacher/{id}/update', [AdminDashboardController::class, 'teacherupdate'])->name('teacher.update');

Route::get('/libraray_managementsystem', [AdminDashboardController::class, 'create'])->name('librarymanage.registration');
Route::post('/book-issues/store', [AdminDashboardController::class, 'storelibrarydata'])->name('book-issues.store');
Route::post('/books', [AdminDashboardController::class, 'storebookdata'])->name('books.store');

// Route::post('/library/store', [AdminDashboardController::class, 'create'])->name('library.store');

Route::post('/student-registration', [AdminDashboardController::class, 'stores'])->name('student.store');

Route::get('/child', function () {
    return view('layouts/child');
});


require __DIR__.'/auth.php';


