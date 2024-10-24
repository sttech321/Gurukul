@extends('layouts.admin.sidebar')

@section('content')
<div class="innerPageWrapper">
    <div class="box mb-4">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#StudentPopupRegistration">
            {{ __('messages.add_new_student') }}
        </button>
    </div>

    <!-- Teacher List Table -->
    <!-- <h1 class="text-center">Student Registration</h1><br> -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="panel-info-wrap table-responsive">
        <table class="table panel-table">
            <thead class="">
                <tr>
                    <th scope="col">
                        Student Name
                    </th>
                    <th scope="col">
                        DOB
                    </th>
                    <th scope="col">
                        Aadhaar Card
                    </th>
                    <th scope="col">
                        Address
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($student as $registration)
                <tr class="">
                    <td>
                        {{ $registration->name }}
                    </td>
                    <td>
                        {{ $registration->date_of_birth }}
                    </td>
                    <td>
                        {{ $registration->aadhaar_card }}
                    </td>
                    <td class="addressField">
                        {{ $registration->home_address }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="editstudentform({{ $registration->id }})" data-bs-target="#StudentPopupRegistration2">
                            Edit
                        </button>
                        <form action="{{ route('student.destroyAdmin', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade addContentModal" id="StudentPopupRegistration" tabindex="-1" aria-labelledby="StudentPopupRegistrationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form id="studentform" action="{{ route('student.storeAdmin') }}" method="POST" class="gurukul registration-content">
                            <div class="row">
                                @csrf
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gurukul Id</label>
                                        <select id="gurukulid" name="gurukulid" class="form-select form-control">
                                            <option value="">Select Gurukul</option>
                                            @foreach($gurukuls as $gurukul)
                                            <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Class</label>
                                        <select id="gurukulclass" name="std_class" class="form-select form-control">
                                            <option value="">Select class</option>
                                            @foreach($Add_student_class as $class)
                                            <option value="{{ $class->id }}">{{ $class->std_classes  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 center">
                                    <!-- <span class="text-danger" id="gurukulclass-error"></span> -->
                                    <select id="gurukulclass" name="std_class" class="form-select form-control">
                                        <option value="">Select class</option> <!-- Optional placeholder option -->
                                        @foreach($Add_student_class as $class)
                                        <option value="{{ $class->id }}">{{ $class->std_classes  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <span class="text-danger" id="name-error"></span>
                                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" required><br>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div>
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password " class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Name</label>
                                        <input type="text" id="father_name" name="father_name" placeholder="Father Name" class="form-control" required><br>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Name</label>
                                        <input type="text" id="mother_name" name="mother_name" placeholder="Mother Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">DOB</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth" placeholder="date_of_birth" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Aadhaar Card</label>
                                        <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="Aadhaar Card" class="form-control" maxlength="12" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Home Address</label>
                                        <textarea id="home_address" name="home_address" placeholder="Home Address" required class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Dob</label>
                                        <input type="date" id="father_dob" name="father_dob" placeholder="Father Dob" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Aadhaar Card</label>
                                        <input type="text" id="father_aadhaar_card" name="father_aadhaar_card" placeholder="Father Aadhaar Card" class="form-control" maxlength="12" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Address</label>
                                        <input type="text" id="father_address" name="father_address" placeholder="Father Address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Mobile Number</label>
                                        <input type="text" id="father_mobile_number" name="father_mobile_number" placeholder="Father Mobile Number" class="form-control" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father Profession</label>
                                        <input type="text" id="father_profession" name="father_profession" placeholder="Father Profession" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Dob</label>
                                        <input type="date" id="mother_dob" name="mother_dob" placeholder="Mother Dob" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Aadhaar Card</label>
                                        <input type="text" name="mother_aadhaar_card" placeholder="Mother Aadhaar Card" class="form-control" maxlength="12" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Address</label>
                                        <input type="text" id="mother_address" name="mother_address" placeholder="Mother Address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Mobile Number</label>
                                        <input type="text" id="mother_mobile_number" name="mother_mobile_number" placeholder="Mother Mobile Number" class="form-control" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Profession</label>
                                        <input type="text" id="mother_profession" name="mother_profession" placeholder="Mother Profession" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 text-center">
                                    <div class="submitBtnWrap mt-3 mb-2">
                                        <button type="submit" id="submit-button" class="btn btn-primary btn-md px-4">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade addContentModal" id="StudentPopupRegistration2" tabindex="-1" aria-labelledby="StudentPopupRegistration2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form id="studentforms" action="{{ route('student.storeAdmin') }}" method="POST" class="gurukul registration-content">
                        <div class="row">
                            @csrf
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gurukul Id</label>
                                    <select id="gurukulid" name="gurukulid" class="form-select form-control">
                                        <option value="">Select Gurukul</option>
                                        @foreach($gurukuls as $gurukul)
                                        <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Class</label>
                                    <select id="gurukulclass" name="std_class" class="form-select form-control">
                                        <option value="">Select class</option>
                                        @foreach($Add_student_class as $class)
                                        <option value="{{ $class->id }}">{{ $class->std_classes  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" name="formid" id="formid">
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" id="father_name" name="father_name" placeholder="Father Name" class="form-control" required><br>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Name</label>
                                    <input type="text" id="mother_name" name="mother_name" placeholder="Mother Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">DOB</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="date_of_birth" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Aadhaar Card</label>
                                    <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="Aadhaar Card" class="form-control" maxlength="12" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Home Address</label>
                                    <textarea id="home_address" name="home_address" placeholder="Home Address" required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Dob</label>
                                    <input type="date" id="father_dob" name="father_dob" placeholder="Father Dob" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Aadhaar Card</label>
                                    <input type="text" id="father_aadhaar_card" name="father_aadhaar_card" placeholder="Father Aadhaar Card" class="form-control" maxlength="12" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Address</label>
                                    <input type="text" id="father_address" name="father_address" placeholder="Father Address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Mobile Number</label>
                                    <input type="text" id="father_mobile_number" name="father_mobile_number" placeholder="Father Mobile Number" class="form-control" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father Profession</label>
                                    <input type="text" id="father_profession" name="father_profession" placeholder="Father Profession" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Dob</label>
                                    <input type="date" id="mother_dob" name="mother_dob" placeholder="Mother Dob" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Aadhaar Card</label>
                                    <input type="text" name="mother_aadhaar_card" placeholder="Mother Aadhaar Card" class="form-control" maxlength="12" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Address</label>
                                    <input type="text" id="mother_address" name="mother_address" placeholder="Mother Address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Mobile Number</label>
                                    <input type="text" id="mother_mobile_number" name="mother_mobile_number" placeholder="Mother Mobile Number" class="form-control" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother Profession</label>
                                    <input type="text" id="mother_profession" name="mother_profession" placeholder="Mother Profession" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 text-center">
                                <div class="submitBtnWrap mt-3 mb-2">
                                    <button type="submit" id="submit-button" class="btn btn-primary btn-md px-4">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function editstudentform(gurukulId) {
        // Fetch the data via AJAX
        fetch(`/student/${gurukulId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Get the form element
                const form = document.getElementById('studentforms');

                // Set Gurukul ID
                const selectbranch = form.querySelector('#gurukulid');
                selectbranch.value = data.gurukulid;

                // Set Class ID
                const selectclass = form.querySelector('#gurukulclass'); // Corrected spelling
                selectclass.value = data.std_class;

                // Populate the other form fields
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

                // Update the form action for update
                form.action = `/student/${gurukulId}/update`;

            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When the gurukulid dropdown changes
        $('#gurukulid').on('change', function() {
            var gurukulid = $(this).val(); // Get the selected gurukulid
            
            if (gurukulid) {
                // Make an AJAX request to fetch teachers based on the selected gurukulid
                $.ajax({
                    url: "{{ route('fetch.teachers') }}", // Use the route to fetch teachers
                    type: "POST",
                    data: {
                        gurukulid: gurukulid,
                        _token: "{{ csrf_token() }}" // Include CSRF token for security
                    },
                    success: function(response) {
                        $('#teacherid').empty(); // Clear previous options
                        $('#teacherid').append('<option value="">Select Teacher</option>'); // Default option

                        // Loop through the response and append each teacher as an option
                        $.each(response, function(key, teacher) {
                            $('#teacherid').append('<option value="' + teacher.id + '">' + teacher.name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching teacher data.');
                    }
                });
            } else {
                $('#teacherid').empty(); // Clear the teacher dropdown if no gurukul is selected
                $('#teacherid').append('<option value="">Select Teacher</option>'); // Reset default option
            }
        });
    });
</script>
@endsection