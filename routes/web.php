<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\PrincipalDashboardController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route based on user role
Route::get('/dashboard', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on the user's role
        if ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->role === 'principal') {
            return redirect()->route('principal.dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    // If not authenticated, redirect to the login page
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
Route::get('/gurukul_registration_page', [AdminDashboardController::class, 'gurukul_registration_page'])->name('gurukul.registration')->middleware('role:admin');
Route::get('/gurukul/{id}/edit', [AdminDashboardController::class, 'edit'])->name('gurukul.edit')->middleware('role:admin');
Route::post('/gurukul/{id}/update', [AdminDashboardController::class, 'update'])->name('gurukul.update')->middleware('role:admin');
Route::delete('/gurukul/{id}', [AdminDashboardController::class, 'destroy'])->name('gurukul.destroy')->middleware('role:admin');
Route::post('/gurukul/register', [AdminDashboardController::class, 'store'])->name('gurukul.register')->middleware('role:admin');

Route::get('/student_registration', [AdminDashboardController::class, 'student_registration'])->name('student.registration')->middleware('role:admin');
Route::post('/student-registration', [AdminDashboardController::class, 'stores'])->name('student.store')->middleware('role:admin');
Route::delete('/student/{id}', [AdminDashboardController::class, 'destroystudenttable'])->name('student.destroy')->middleware('role:admin');
Route::get('/student/{id}/edit', [AdminDashboardController::class, 'studentedit'])->name('student.edit')->middleware('role:admin');
Route::post('/student/{id}/update', [AdminDashboardController::class, 'studentupdate'])->name('student.update')->middleware('role:admin');

Route::post('/teacher-registration', [AdminDashboardController::class, 'storing_teacher_registration_data'])->name('teacher.registration.store')->middleware('role:admin');
Route::get('/teacher_registration', [AdminDashboardController::class, 'teacher_registration'])->name('teacher.registration')->middleware('role:admin');
Route::delete('/teacher/{id}', [AdminDashboardController::class, 'destroyteachertable'])->name('teacher.destroy')->middleware('role:admin');
Route::get('/teacher/{id}/edit', [AdminDashboardController::class, 'teacheredit'])->name('teacher.edit')->middleware('role:admin');
Route::post('/teacher/{id}/update', [AdminDashboardController::class, 'teacherupdate'])->name('teacher.update')->middleware('role:admin');


Route::get('/inventory_management', [AdminDashboardController::class, 'inventory_management'])->name('inventory.registration');
Route::get('/libraray_managementsystem', [AdminDashboardController::class, 'create'])->name('librarymanage.registration');
Route::post('/book-issues/store', [AdminDashboardController::class, 'storelibrarydata'])->name('book-issues.store');
Route::post('/books', [AdminDashboardController::class, 'storebookdata'])->name('books.store');

// Route::post('/library/store', [AdminDashboardController::class, 'create'])->name('library.store');
Route::get('/add_new_class', [AdminDashboardController::class, 'showStdClass'])->name('add.class');
// Route to create a new class
Route::post('class/create', [AdminDashboardController::class, 'createnewclass'])->name('class.create');
// Route to update an existing class
Route::post('/class/update/{id}', [AdminDashboardController::class, 'updatenewclass'])->name('class.update');
// Route to delete a class
Route::delete('/class/delete/{id}', [AdminDashboardController::class, 'deletenewclass'])->name('class.delete');
// Route to edit a class (fetch data for editing)
Route::get('/class/edit/{id}', [AdminDashboardController::class, 'editnewclass'])->name('class.edit');

Route::post('/locale', LocaleController::class)->name('locale.change');


Route::get('/child', function () {
    return view('layouts/child');
});

require __DIR__.'/auth.php';
