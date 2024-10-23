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

class AdminDashboardController extends Controller
{
    // view page of the admin dashboard
    public function index()
    {
        return view('dashboard/admin');
    }

    // Store gurukul registration page form data
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'gurukul_name' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        // Create Gurukul registration record
        GurukulRegistration::create([
            'gurukul_name' => $request->gurukul_name,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'role' => 'principal',
            'password' => bcrypt($request->password), // Ensure to hash the password
            'trust_name' => $request->trust_name,
            'trust_registration_date' => $request->trust_registration_date,
            'trust_president_name' => $request->trust_president_name,
            'secretary_name' => $request->secretary_name,
            'treasurer_name' => $request->treasurer_name,
            'principal_name' => $request->principal_name,
            'fund_resource' => $request->fund_resource,
            'setup_type' => $request->setup_type,
            'focus_area' => implode(', ', $request->focus_area), // Convert array to string
            'registered_with_education_board' => $request->registered_with_education_board,
            'education_board_name' => $request->registered_with_education_board === 'Yes' ? $request->education_board_name : null, // Store if registered
            'facilities' => implode(', ', $request->facilities), // Convert array to string
        ]);

        user::create([
            'First_name' => $request->gurukul_name,
            'Last_name' => $request->gurukul_name,
            'Phone' => $request->mobile_number,
            'email' => $request->email,
            'role' => 'principal',
            'password' => bcrypt($request->password), // Ensure to hash the password
            'address' => $request->address,
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Gurukul Registration successfully submitted!');
    }
    

    // view page of the gurukul registration
    public function gurukul_registration_page()
    {
        $gurukuls = GurukulRegistration::paginate(5);
        return view('layouts/admin/gurukul_registration_page',compact('gurukuls'));
    }

    // edit the gurukul registration form data
    public function edit($id)
    {
        $registration = GurukulRegistration::findOrFail($id);
        return response()->json($registration);
    }

    // Update the Gurukul registration form data
    public function update(Request $request, $id)
    {
        $request->validate([
            'gurukul_name' => 'required|string|max:255',
            // Other validation rules...
        ]);
    
        $registration = GurukulRegistration::findOrFail($id);
    
        // Convert registered_with_education_board to 1 or 0
        $registeredWithEducationBoard = $request->registered_with_education_board === 'Yes' ? 1 : 0;
    
        // Update the registration record
        $registration->update([
            'gurukul_name' => $request->gurukul_name,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'trust_name' => $request->trust_name,
            'trust_registration_date' => $request->trust_registration_date,
            'trust_president_name' => $request->trust_president_name,
            'secretary_name' => $request->secretary_name,
            'treasurer_name' => $request->treasurer_name,
            'principal_name' => $request->principal_name,
            'fund_resource' => $request->fund_resource,
            'setup_type' => $request->setup_type,
            'focus_area' => implode(', ', $request->focus_area), // Convert array to string
            'registered_with_education_board' => $request->registered_with_education_board,
            'education_board_name' => $request->registered_with_education_board === 'Yes' ? $request->education_board_name : null, // Store if registered
            'facilities' => implode(', ', $request->facilities),
        ]);
    
        return redirect()->back()->with('success', 'Gurukul Registration updated successfully.');
    }

    // Delete the Gurukul Registration
    public function destroy($id)
    {
        $registration = GurukulRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->back()->with('success', 'Gurukul Registration deleted successfully.');
    }

    // Delete the teacher Registration
    public function destroyteachertable($id)
    {
        $registration = TeacherRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->back()->with('success', 'Gurukul Registration deleted successfully.');
    }

    // view page of the teacher registration
    public function teacher_registration()
    {
        $gurukuls = GurukulRegistration::paginate(5);
        $teacher = TeacherRegistration::paginate(5);
        return view('layouts.admin.teacher_registration', compact('teacher', 'gurukuls'));
    }

    // Update the teacher registration form data
    public function teacherupdate(Request $request, $id)
    {
        // Validate incoming form data
        $validatedData = $request->validate([
            'gurukulid' => 'required',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'gotra' => 'nullable|string|max:255',
            'varna' => 'nullable|string|max:255',
            'aadhaar_card' => 'required|string|max:12|min:12',
            'home_address' => 'required|string|max:500',
            'mobile_number' => 'required|string|max:10|min:10',
            'guru_name' => 'nullable|string|max:255',
            'ved_shakha' => 'nullable|string|max:255',
            'extra_ordinary_skills' => 'nullable|string|max:500',
            'exceptional_abilities' => 'nullable|string|max:500',
            'modern_education_qualifications' => 'nullable|string|max:500'
        ]);
    
        // Find the teacher record by ID
        $teacher = TeacherRegistration::findOrFail($id);
    
        // Update the teacher record
        $teacher->update([
            'gurukulid' => $validatedData['gurukulid'],
            'name' => $validatedData['name'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'surname' => $validatedData['surname'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gotra' => $validatedData['gotra'],
            'varna' => $validatedData['varna'],
            'aadhaar_card' => $validatedData['aadhaar_card'],
            'home_address' => $validatedData['home_address'],
            'mobile_number' => $validatedData['mobile_number'],
            'guru_name' => $validatedData['guru_name'],
            'ved_shakha' => $validatedData['ved_shakha'],
            'extra_ordinary_skills' => $validatedData['extra_ordinary_skills'],
            'exceptional_abilities' => $validatedData['exceptional_abilities'],
            'modern_education_qualifications' => $validatedData['modern_education_qualifications']
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Teacher Registration updated successfully.');
    }
    
    // edit the teacher registration form data
    public function teacheredit($id)
    {
        $registration = TeacherRegistration::findOrFail($id);
        return response()->json($registration);
    }

    // Store teacher registration page form data
    public function storing_teacher_registration_data(Request $request)
    {
        // Validate incoming form data
        $validatedData = $request->validate([
            'gurukulid' => 'required',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'gotra' => 'nullable|string|max:255',
            'varna' => 'nullable|string|max:255',
            'aadhaar_card' => 'required|string|max:12|min:12',
            'home_address' => 'required|string|max:500',
            'mobile_number' => 'required|string|max:10|min:10',
            'guru_name' => 'nullable|string|max:255',
            'ved_shakha' => 'nullable|string|max:255',
            'extra_ordinary_skills' => 'nullable|string|max:500',
            'exceptional_abilities' => 'nullable|string|max:500',
            'modern_education_qualifications' => 'nullable|string|max:500'
        ]);

        // Store the validated data in the database

        TeacherRegistration::create([
            'gurukulid' => $validatedData['gurukulid'],
            'name' => $validatedData['name'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'surname' => $validatedData['surname'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gotra' => $validatedData['gotra'],
            'varna' => $validatedData['varna'],
            'aadhaar_card' => $validatedData['aadhaar_card'],
            'home_address' => $validatedData['home_address'],
            'mobile_number' => $validatedData['mobile_number'],
            'guru_name' => $validatedData['guru_name'],
            'ved_shakha' => $validatedData['ved_shakha'],
            'extra_ordinary_skills' => $validatedData['extra_ordinary_skills'],
            'exceptional_abilities' => $validatedData['exceptional_abilities'],
            'modern_education_qualifications' => $validatedData['modern_education_qualifications']
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Teacher registration data stored successfully!');
    }

    // view page of the student registration
    public function student_registration()
    {   
        $Add_student_class = Add_student_class::all();
        $gurukuls = GurukulRegistration::all();
        $student = StudentRegistration::all();
        return view('layouts/admin/student_registration',compact('student','gurukuls','Add_student_class'));
    }

    // edit the student form data
    public function studentedit($id)
    {
        $registration = StudentRegistration::findOrFail($id);
        return response()->json($registration);
    }
    
    // Delete the student Registration
    public function destroystudenttable($id)
    {
        $registration = StudentRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->back()->with('success', 'Gurukul Registration deleted successfully.');
    }

    // Update the student form data
    public function studentupdate(Request $request, $id){
        $validatedData = $request->validate([
            'gurukulid' => 'required',
            'std_class' => 'required',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'aadhaar_card' => 'required|string|max:12|min:12',
            'home_address' => 'required|string|max:500',
            'father_dob' => 'required|date',
            'father_aadhaar_card' => 'required|string|max:12|min:12',
            'father_address' => 'required|string|max:500',
            'father_mobile_number' => 'required|string|max:10|min:10',
            'father_profession' => 'required|string|max:255',
            'mother_dob' => 'required|date',
            'mother_aadhaar_card' => 'required|string|max:12|min:12',
            'mother_address' => 'required|string|max:500',
            'mother_mobile_number' => 'required|string|max:10|min:10',
            'mother_profession' => 'required|string|max:255',
        ]);

        $student = StudentRegistration::findOrFail($id);
        

        $student->update([
            'gurukulid' => $validatedData['gurukulid'],
            'std_class' => $validatedData['std_class'],
            'name' => $validatedData['name'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'aadhaar_card' => $validatedData['aadhaar_card'] ?? null,  // Use null if the field is nullable
            'home_address' => $validatedData['home_address'] ?? null,
            'father_dob' => $validatedData['father_dob'] ?? null,
            'father_aadhaar_card' => $validatedData['father_aadhaar_card'] ?? null,
            'father_address' => $validatedData['father_address'] ?? null,
            'father_mobile_number' => $validatedData['father_mobile_number'] ?? null,
            'father_profession' => $validatedData['father_profession'] ?? null,
            'mother_dob' => $validatedData['mother_dob'] ?? null,
            'mother_aadhaar_card' => $validatedData['mother_aadhaar_card'] ?? null,
            'mother_address' => $validatedData['mother_address'] ?? null,
            'mother_mobile_number' => $validatedData['mother_mobile_number'] ?? null,
            'mother_profession' => $validatedData['mother_profession'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Student update successfully!');
    }

    // Store student registration page form data
    public function stores(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'gurukulid' => 'required',
            'std_class' => 'required',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'aadhaar_card' => 'required|string|max:12|min:12',
            'home_address' => 'required|string|max:500',
            'father_dob' => 'required|date',
            'father_aadhaar_card' => 'required|string|max:12|min:12',
            'father_address' => 'required|string|max:500',
            'father_mobile_number' => 'required|string|max:10|min:10',
            'father_profession' => 'required|string|max:255',
            'mother_dob' => 'required|date',
            'mother_aadhaar_card' => 'required|string|max:12|min:12',
            'mother_address' => 'required|string|max:500',
            'mother_mobile_number' => 'required|string|max:10|min:10',
            'mother_profession' => 'required|string|max:255',
        ]);

        StudentRegistration::create([
            'gurukulid' => $validatedData['gurukulid'],
            'std_class' => $validatedData['std_class'],
            'name' => $validatedData['name'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'aadhaar_card' => $validatedData['aadhaar_card'] ?? null,  // Use null if the field is nullable
            'home_address' => $validatedData['home_address'] ?? null,
            'father_dob' => $validatedData['father_dob'] ?? null,
            'father_aadhaar_card' => $validatedData['father_aadhaar_card'] ?? null,
            'father_address' => $validatedData['father_address'] ?? null,
            'father_mobile_number' => $validatedData['father_mobile_number'] ?? null,
            'father_profession' => $validatedData['father_profession'] ?? null,
            'mother_dob' => $validatedData['mother_dob'] ?? null,
            'mother_aadhaar_card' => $validatedData['mother_aadhaar_card'] ?? null,
            'mother_address' => $validatedData['mother_address'] ?? null,
            'mother_mobile_number' => $validatedData['mother_mobile_number'] ?? null,
            'mother_profession' => $validatedData['mother_profession'] ?? null,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student registration data stored successfully!');
    }

    // Add new class fucntionality start here
    // View the new class page
    public function showStdClass()
    {
        // Fetch data from the database if needed
        $std_class = Add_student_class::all(); // Example: Fetch all standard classes
        // Return the view with the data
        return view('layouts/admin/add_class', compact('std_class'));
    }

    // store the new class
    public function createnewclass(Request $request)
    {
        $request->validate([
            'std_classes' => 'required|unique:add_student_classes,std_classes', // Ensure it's unique
        ]);
    
        // Store new class
        Add_student_class::create([
            'std_classes' => $request->std_classes,
        ]);
    
        return redirect()->back()->with('success', 'Class added successfully!');
    }    

    // Update the new class
    public function updatenewclass(Request $request, $id){
        $validatedData = $request->validate([
            'std_classes' => 'required|unique:add_student_classes,std_classes',
        ]);

        $newclass = Add_student_class::findOrFail($id);
        $newclass->update([
            'std_classes' => $validatedData['std_classes'],
        ]);

        return redirect()->back()->with('success', 'New class update successfully!');
    }

    // Delete the new class
    public function deletenewclass($id)
    {
        $registration = Add_student_class::findOrFail($id);
        $registration->delete();

        return redirect()->back()->with('success', 'New class deleted successfully.');
    }

    // Edit new class 
    public function editnewclass($id)
    {
        $registration = Add_student_class::findOrFail($id);
        return response()->json($registration);
    }
    // Add new class fucntionality end here
    
    // Store inventory registration page form data
    public function inventory_management()
    {
        return view('layouts/admin/inventory_management');
    }

    // view page of the library management
    public function create()
    {
        $books = Book::all(); // Fetch all books for the dropdown
        $users = StudentRegistration::all(); // Fetch all users for the dropdown
        return view('layouts/admin/libraray_managementsystem', compact('books', 'users'));
    }

    // store the library book data
    public function storelibrarydata(Request $request)
    {
        // Validate form data
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'isbn' => 'required|string|max:13',
            'user_id' => 'required|exists:users,id',
            'issue_date' => 'required|date',
            'expected_return' => 'required|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:issued,returned,overdue',
        ]);

        // Store new book issue
        BookIssue::create([
            'book_id' => $request->book_id,
            'isbn' => $request->isbn,
            'user_id' => $request->user_id,
            'issue_date' => $request->issue_date,
            'expected_return' => $request->expected_return,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Book issued successfully!');
    }

    // store the new book
    public function storebookdata(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:books',
            'author' => 'required|string|max:255',
            'published_at' => 'required|date',
        ]);

        Book::create($request->all());

        return redirect()->back()->with('success', 'Book added successfully.');
    }
}
