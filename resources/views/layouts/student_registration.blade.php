@extends('layouts.sidebar')

@section('content')
<div class="container mx-auto p-6">
    <div class="box">
        <a class="btn btn-primary" href="#popup1" onclick="openPopup('add')">Add new Student</a>
    </div>
       <!-- Teacher List Table -->
   <h1 class="text-center">Student Registration Page</h1><br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Student Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DOB
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aadhaar Card
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($student as $registration)
                <tr class="">
                    <td class="px-6 py-4">
                    {{ $registration->name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->date_of_birth }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->aadhaar_card }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->home_address }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#popup2" class="edit-gurukul btn btn-primary" onclick="editstudentform({{ $registration->id }})">Edit</a>
                        <form action="{{ route('student.destroy', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<div id="popup1" class="overlay">
    <div class="popup">
        <h3 class="text-center">Student Registration Form</h3>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form id="studentform" action="{{ route('student.store') }}" method="POST" class="form-control mx-auto w-75 mt-3">
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
                    <button type="submit" class="btn btn-primary center mx-auto d-block w-50 form-control">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="popup2" class="overlay">
    <div class="popup">
        <h3 class="text-center">Student Registration Form</h3>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="studentform" action="{{ route('student.store') }}" method="POST" class="form-control mx-auto mt-3 w-75">
                @csrf
                <!-- Student Details -->
                <div class="mb-3 center">
                    <!-- <label>Name:</label> -->
                    <input type="hidden" name="formid" id="formid" value="">
                    <input type="text" id="name" name="name" placeholder="name" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Father's Name:</label> -->
                    <input type="text" id="father_name" name="father_name" placeholder="father_name" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Mother's Name:</label> -->
                    <input type="text" id="mother_name" name="mother_name" placeholder="mother_name" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Date of Birth:</label> -->
                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="date_of_birth" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Aadhaar Card:</label> -->
                    <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="aadhaar_card" class="form-control" maxlength="12" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Home Address:</label> -->
                    <input type="text" id="home_address" name="home_address" placeholder="home_address" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                <h4>Father's Details</h4>
                    <!-- <label>Father's Date of Birth:</label> -->
                    <input type="date" id="father_dob" name="father_dob" placeholder="father_dob" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Father's Aadhaar Card:</label> -->
                    <input type="text" id="father_aadhaar_card" name="father_aadhaar_card" placeholder="father_address" class="form-control" maxlength="12" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Father's Address:</label> -->
                    <input type="text" id="father_address" name="father_address" placeholder="father_address" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Father's Mobile Number:</label> -->
                    <input type="text" id="father_mobile_number" name="father_mobile_number" placeholder="father_mobile_number" class="form-control" maxlength="10" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Father's Profession:</label> -->
                    <input type="text" id="father_profession" name="father_profession" placeholder="father_profession" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                <h4 class="">Mother's Details</h4>
                    <!-- <label>Mother's Date of Birth:</label> -->
                    <input type="date" id="mother_dob" name="mother_dob" placeholder="mother_dob" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Mother's Aadhaar Card:</label> -->
                    <input type="text" id="mother_aadhaar_card" name="mother_aadhaar_card" placeholder="mother_aadhaar_card" class="form-control" maxlength="12" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Mother's Address:</label> -->
                    <input type="text" id="mother_address" name="mother_address" placeholder="mother_address" class="form-control" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Mother's Mobile Number:</label> -->
                    <input type="text" id="mother_mobile_number" name="mother_mobile_number" placeholder="mother_mobile_number" class="form-control" maxlength="10" required><br>
                </div>
                <div class="mb-3 center">
                    <!-- <label>Mother's Profession:</label> -->
                    <input type="text" id="mother_profession" name="mother_profession" placeholder="mother_profession" class="form-control" required><br>
                </div>
                <button type="submit" class="btn btn-primary center form-control mx-auto d-block w-50">update</button>
            </form>
        </div>
    </div>
</div>

<script>
function editstudentform(gurukulId) {
    // Fetch the data via AJAX
    fetch(`/student/${gurukulId}/edit`)
        .then(response => response.json())
        .then(data => {
            // Get the form element
            const form = document.getElementById('studentform');

            // Populate the form fields with the fetched data
            form.querySelector('#formid').value = data.formid;
            form.querySelector('#name').value = data.name;
            form.querySelector('#father_name').value = data.father_name;
            form.querySelector('#mother_name').value = data.mother_name;
            form.querySelector('#date_of_birth').value = data.date_of_birth;
            form.querySelector('#aadhaar_card').value = data.aadhaar_card;
            form.querySelector('#home_address').value = data.home_address;
            form.querySelector('#father_dob').value = data.father_dob;
            form.querySelector('#father_aadhaar_card').value = data.father_aadhaar_card;
            form.querySelector('#father_address').value = data.father_address;
            form.querySelector('#father_mobile_number').value = data.father_mobile_number;
            form.querySelector('#father_profession').value = data.father_profession;
            form.querySelector('#mother_dob').value = data.mother_dob;
            form.querySelector('#mother_aadhaar_card').value = data.mother_aadhaar_card;
            form.querySelector('#mother_address').value = data.mother_address;
            form.querySelector('#mother_mobile_number').value = data.mother_mobile_number;
            form.querySelector('#mother_profession').value = data.mother_profession;

            form.action = `/student/${gurukulId}/update`; 

        })
        .catch(error => console.error('Error fetching data:', error));
}
</script>
@endsection
