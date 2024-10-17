@extends('layouts.sidebar')

@section('content')
<div class="container mx-auto p-6">
    <h3 class="text-center">Student Registration Form</h3>
        <br>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <!-- Student Details -->
        <div class="mb-3 center">
        <!-- <label>Name:</label> -->
            <input type="text" name="name" placeholder="name" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Father's Name:</label> -->
            <input type="text" name="father_name" placeholder="father_name" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Mother's Name:</label> -->
            <input type="text" name="mother_name" placeholder="mother_name" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Date of Birth:</label> -->
            <input type="date" name="date_of_birth" placeholder="date_of_birth" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Aadhaar Card:</label> -->
            <input type="text" name="aadhaar_card" placeholder="aadhaar_card" class="form-control" maxlength="12" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Home Address:</label> -->
            <input type="text" name="home_address" placeholder="home_address" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
        <h4>Father's Details</h4>
            <!-- <label>Father's Date of Birth:</label> -->
            <input type="date" name="father_dob" placeholder="father_dob" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Father's Aadhaar Card:</label> -->
            <input type="text" name="father_aadhaar_card" placeholder="father_address" class="form-control" maxlength="12" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Father's Address:</label> -->
            <input type="text" name="father_address" placeholder="father_address" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Father's Mobile Number:</label> -->
            <input type="text" name="father_mobile_number" placeholder="father_mobile_number" class="form-control" maxlength="10" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Father's Profession:</label> -->
            <input type="text" name="father_profession" placeholder="father_profession" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
        <h4 class="">Mother's Details</h4>
            <!-- <label>Mother's Date of Birth:</label> -->
            <input type="date" name="mother_dob" placeholder="mother_dob" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Mother's Aadhaar Card:</label> -->
            <input type="text" name="mother_aadhaar_card" placeholder="mother_aadhaar_card" class="form-control" maxlength="12" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Mother's Address:</label> -->
            <input type="text" name="mother_address" placeholder="mother_address" class="form-control" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Mother's Mobile Number:</label> -->
            <input type="text" name="mother_mobile_number" placeholder="mother_mobile_number" class="form-control" maxlength="10" required><br>
        </div>
        <div class="mb-3 center">
            <!-- <label>Mother's Profession:</label> -->
            <input type="text" name="mother_profession" placeholder="mother_profession" class="form-control" required><br>
        </div>
        <button type="submit" class="btn btn-primary center">Submit</button>
    </form>
</div>
@endsection
