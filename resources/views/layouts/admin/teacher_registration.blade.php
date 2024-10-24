@extends('layouts.admin.sidebar')

@section('content')
<div class="innerPageWrapper">
    <div class="box mb-4">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#teacherRegistration">
            {{ __('Add new teacher') }}
        </button>
    </div>
    <!-- Teacher List Table -->
    <!-- <h1 class="text-center">Teacher Registration</h1><br> -->
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
            <thead class="panel-heading">
                <tr>
                    <th scope="col">
                        Teacher Name
                    </th>
                    <th scope="col">
                        Branch
                    </th>
                    <th scope="col">
                        Guru Name
                    </th>
                    <th scope="col">
                        Mobile Number
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher as $registration)
                <tr class="">
                    <td>
                        {{ $registration->name }}
                    </td>
                    <td>
                        {{ $registration->ved_shakha }}
                    </td>
                    <td>
                        {{ $registration->guru_name }}
                    </td>
                    <td>
                        {{ $registration->mobile_number }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="editstudentform({{ $registration->id }})" data-bs-target="#editTeacherRegistration">
                            Edit
                        </button>
                        <form action="{{ route('teacher.destroyAdmin', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $teacher->links() }}
    </div>

    <div class="modal fade addContentModal" id="teacherRegistration" tabindex="-1" aria-labelledby="teacherRegistrationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Teacher Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form action="{{ route('teacher.registration.storeAdmin') }}" method="POST" class="gurukul registration-content">
                            <div class="row">
                                @csrf
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gurukul Id</label>
                                        <select id="gurukulid" name="gurukulid" class="form-select form-control">
                                            <option value="">Select Gurukul</option>
                                            @foreach($gurukuls as $gurukul)
                                            <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father's Name</label>
                                        <input type="text" id="father_name" name="father_name" placeholder="Father's Name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother's Name</label>
                                        <input type="text" id="mother_name" name="mother_name" placeholder="Mother's Name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div>
                                        <label class="form-label">Surname</label>
                                        <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">DOB</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth" placeholder="DOB" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gotra</label>
                                        <input type="text" id="gotra" name="gotra" placeholder="Gotra" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Varna</label>
                                        <input type="text" id="varna" name="varna" placeholder="Varna" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Aadhaar Card</label>
                                        <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="Aadhaar Card" required class="form-control">
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
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Guru Name</label>
                                        <input type="text" id="guru_name" name="guru_name" placeholder="Guru Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Ved Shakha/Pravar</label>
                                        <input type="text" id="ved_shakha" name="ved_shakha" placeholder="Ved Shakha/Pravar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Extra Ordinary Skills</label>
                                        <textarea id="extra_ordinary_skills" name="extra_ordinary_skills" placeholder="Extra Ordinary Skills" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Exceptional Abilities/Skills</label>
                                        <textarea id="exceptional_abilities" name="exceptional_abilities" placeholder="Exceptional Abilities/Skills" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Modern Education Qualifications</label>
                                        <textarea id="modern_education_qualifications" name="modern_education_qualifications" placeholder="modern_education_qualifications" class="form-control"></textarea>
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


<div class="modal fade addContentModal" id="editTeacherRegistration" tabindex="-1" aria-labelledby="editTeacherRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Teacher Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form id="teacherform" action="{{ route('teacher.registration.storeAdmin') }}" method="POST" class="gurukul registration-content">
                        <div class="row">
                            @csrf
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gurukul Id</label>
                                    <select id="gurukulid" name="gurukulid" class="form-select form-control">
                                        <option value="">Select Gurukul</option>
                                        @foreach($gurukuls as $gurukul)
                                        <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" id="formid" value="">
                                    <input type="text" id="name" name="name" placeholder="Name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" id="father_name" name="father_name" placeholder="Father's Name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mother's Name</label>
                                    <input type="text" id="mother_name" name="mother_name" placeholder="Mother's Name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <label class="form-label">Surname</label>
                                    <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">DOB</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="DOB" required class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gotra</label>
                                    <input type="text" id="gotra" name="gotra" placeholder="Gotra" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Varna</label>
                                    <input type="text" id="varna" name="varna" placeholder="Varna" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Aadhaar Card</label>
                                    <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="Aadhaar Card" required class="form-control">
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
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Guru Name</label>
                                    <input type="text" id="guru_name" name="guru_name" placeholder="Guru Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Ved Shakha/Pravar</label>
                                    <input type="text" id="ved_shakha" name="ved_shakha" placeholder="Ved Shakha/Pravar" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Extra Ordinary Skills</label>
                                    <textarea id="extra_ordinary_skills" name="extra_ordinary_skills" placeholder="Extra Ordinary Skills" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Exceptional Abilities/Skills</label>
                                    <textarea id="exceptional_abilities" name="exceptional_abilities" placeholder="Exceptional Abilities/Skills" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Modern Education Qualifications</label>
                                    <textarea id="modern_education_qualifications" name="modern_education_qualifications" placeholder="modern_education_qualifications" class="form-control"></textarea>
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


<script>
    function editstudentform(gurukulId) {
        // Fetch the data via AJAX
        fetch(`teacher/${gurukulId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Get the form element
                const form = document.getElementById('teacherform');

                // Populate the form fields with the fetched data
                form.querySelector('#formid').value = data.formid;
                const setupTypeSelect = form.querySelector('#gurukulid');
                setupTypeSelect.value = data.gurukulid;
                form.querySelector('#name').value = data.name;
                form.querySelector('#father_name').value = data.father_name;
                form.querySelector('#mother_name').value = data.mother_name;
                form.querySelector('#surname').value = data.surname;
                form.querySelector('#date_of_birth').value = data.date_of_birth;
                form.querySelector('#gotra').value = data.gotra;
                form.querySelector('#varna').value = data.varna;
                form.querySelector('#aadhaar_card').value = data.aadhaar_card;
                form.querySelector('#home_address').value = data.home_address;
                form.querySelector('#mobile_number').value = data.mobile_number;
                form.querySelector('#guru_name').value = data.guru_name;
                form.querySelector('#ved_shakha').value = data.ved_shakha;
                form.querySelector('#extra_ordinary_skills').value = data.extra_ordinary_skills;
                form.querySelector('#exceptional_abilities').value = data.exceptional_abilities;
                form.querySelector('#modern_education_qualifications').value = data.modern_education_qualifications;

                form.action = `/admin/teacher/${gurukulId}/update`;

            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>
@endsection