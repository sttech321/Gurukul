@extends('layouts.sidebar')

@section('content')
<div class="container mx-auto p-6">
    <div class="box">
        <a class="btn btn-primary" href="#popup1" onclick="openPopup('add')"> {{ __('messages.add_new_teacher') }}</a>
    </div>
       <!-- Teacher List Table -->
   <h1 class="text-center">{{ __('messages.teacher_registration_page') }}</h1><br>
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.teacher_name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.branch') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.guru_name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.mobile_number') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($teacher as $registration)
                <tr class="">
                    <td class="px-6 py-4">
                    {{ $registration->name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->ved_shakha }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->guru_name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->mobile_number }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#popup2" class="edit-gurukul btn btn-primary" onclick="editstudentform({{ $registration->id }})">{{ __('messages.edit')}}</a>
                        <form action="{{ route('teacher.destroy', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('messages.delete')}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h1 class="text-center" id="form-title">{{ __('messages.add_new_teacher') }}</h1>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form action="{{ route('teacher.registration.store') }}" method="POST" class="form-control w-75 mx-auto mt-3">
                    @csrf
                    <div class="mb-3 center">
                    <select id="gurukulid" name="gurukulid" class="form-select form-control">
                        <option value="">{{ __('messages.select_gurukul') }}</option> <!-- Placeholder option -->
                        @foreach($gurukuls as $gurukul)
                            <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3 center">
                        <!-- <label for="name">Name:</label> -->
                        <input type="text" id="name" name="name" placeholder="{{ __('messages.name') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center">       
                        <!-- <label for="father_name">Father's Name:</label> -->
                        <input type="text" id="father_name" name="father_name" placeholder="{{ __('messages.father_name') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center">
                        <!-- <label for="mother_name">Mother's Name:</label> -->
                        <input type="text" id="mother_name" name="mother_name" placeholder="{{ __('messages.mother_name') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center">
                        <!-- <label for="surname">Surname:</label> -->
                        <input type="text" id="surname" name="surname" placeholder="{{ __('messages.surname') }}" class="form-control">
                    </div>
                    <div class="mb-3 center">
                        <!-- <label for="date_of_birth">Date of Birth:</label> -->
                        <input type="date" id="date_of_birth" name="date_of_birth" placeholder="{{ __('messages.date_of_birth') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="gotra">Gotra:</label> -->
                        <input type="text" id="gotra" name="gotra" placeholder="{{ __('messages.gotra') }}" class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="varna">Varna:</label> -->
                        <input type="text" id="varna" name="varna" placeholder="{{ __('messages.varna') }}" class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="aadhaar_card">Aadhaar Card:</label> -->
                        <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="{{ __('messages.aadhaar_card') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="home_address">Home Address:</label> -->
                        <textarea id="home_address" name="home_address" placeholder="{{ __('messages.home_address') }}" required class="form-control"></textarea>
                    </div>
                        <div class="mb-3 center"> 
                        <!-- <label for="mobile_number">Mobile Number:</label> -->
                        <input type="text" id="mobile_number" name="mobile_number" placeholder="{{ __('messages.mobile_number') }}" required class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="guru_name">Guru Name:</label> -->
                        <input type="text" id="guru_name" name="guru_name" placeholder="{{ __('messages.guru_name') }}" class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="ved_shakha">Ved Shakha/Pravar:</label> -->
                        <input type="text" id="ved_shakha" name="ved_shakha" placeholder="{{ __('messages.ved_shakha') }}" class="form-control">
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="extra_ordinary_skills">Extra Ordinary Skills:</label> -->
                        <textarea id="extra_ordinary_skills" name="extra_ordinary_skills" placeholder="{{ __('messages.extra_ordinary_skills') }}" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="exceptional_abilities">Exceptional Abilities/Skills:</label> -->
                        <textarea id="exceptional_abilities" name="exceptional_abilities" placeholder="{{ __('messages.exceptional_abilities') }}" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 center"> 
                        <!-- <label for="modern_education_qualifications">Modern Education Qualifications:</label> -->
                        <textarea id="modern_education_qualifications" name="modern_education_qualifications" placeholder="{{ __('messages.modern_education_qualifications') }}" class="form-control"></textarea>
                    </div>
                    <!-- <div class="mb-3 center">  -->
                        <button type="submit" class="btn btn-primary center form-control w-50 mx-auto d-block">{{ __('messages.submit') }}</button>
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </div>
</div>

<div id="popup2" class="overlay">
    <div class="popup">
        <h1 class="text-center" id="form-title">{{ __('messages.teacher_update_page') }}</h1>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="teacherform" action="{{ route('teacher.registration.store') }}" method="POST" class="form-control mt-3 w-75 mx-auto">
                @csrf
                <!-- Gurukul name -->
                <div class="mb-3 center">
                    <!-- <label for="type_of_setup" class="form-label">Type of Setup</label> -->
                    <select id="gurukulid" name="gurukulid" class="form-select form-control">
                        <option value="">{{ __('messages.select_gurukul') }}</option> <!-- Optional placeholder option -->
                        @foreach($gurukuls as $gurukul)
                            <option value="{{ $gurukul->id }}">{{ $gurukul->gurukul_name  }}</option> <!-- Replace 'id' with the actual field you want to use as value -->
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 center">
                    <!-- <label for="name">Name:</label> -->
                     <input type="hidden" id="formid" value="">
                    <input type="text" id="name" name="name" placeholder="{{ __('messages.name') }}" required class="form-control">
                </div>
                <div class="mb-3 center">       
                    <!-- <label for="father_name">Father's Name:</label> -->
                    <input type="text" id="father_name" name="father_name" placeholder="{{ __('messages.father_name') }}" required class="form-control">
                </div>
                <div class="mb-3 center">
                    <!-- <label for="mother_name">Mother's Name:</label> -->
                    <input type="text" id="mother_name" name="mother_name" placeholder="{{ __('messages.mother_name') }}" required class="form-control">
                </div>
                <div class="mb-3 center">
                    <!-- <label for="surname">Surname:</label> -->
                    <input type="text" id="surname" name="surname" placeholder="{{ __('messages.surname') }}" class="form-control">
                </div>
                <div class="mb-3 center">
                    <!-- <label for="date_of_birth">Date of Birth:</label> -->
                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="{{ __('messages.date_of_birth') }}" required class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="gotra">Gotra:</label> -->
                    <input type="text" id="gotra" name="gotra" placeholder="{{ __('messages.gotra') }}" class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="varna">Varna:</label> -->
                    <input type="text" id="varna" name="varna" placeholder="{{ __('messages.varna') }}" class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="aadhaar_card">Aadhaar Card:</label> -->
                    <input type="text" id="aadhaar_card" name="aadhaar_card" placeholder="{{ __('messages.aadhaar_card') }}" required class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="home_address">Home Address:</label> -->
                    <textarea id="home_address" name="home_address" placeholder="{{ __('messages.home_address') }}" required class="form-control"></textarea>
                </div>
                    <div class="mb-3 center"> 
                    <!-- <label for="mobile_number">Mobile Number:</label> -->
                    <input type="text" id="mobile_number" name="mobile_number" placeholder="{{ __('messages.mobile_number') }}" required class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="guru_name">Guru Name:</label> -->
                    <input type="text" id="guru_name" name="guru_name" placeholder="{{ __('messages.guru_name') }}" class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="ved_shakha">Ved Shakha/Pravar:</label> -->
                    <input type="text" id="ved_shakha" name="ved_shakha" placeholder="{{ __('messages.ved_shakha') }}" class="form-control">
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="extra_ordinary_skills">Extra Ordinary Skills:</label> -->
                    <textarea id="extra_ordinary_skills" name="extra_ordinary_skills" placeholder="{{ __('messages.extra_ordinary_skills') }}" class="form-control"></textarea>
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="exceptional_abilities">Exceptional Abilities/Skills:</label> -->
                    <textarea id="exceptional_abilities" name="exceptional_abilities" placeholder="{{ __('messages.exceptional_abilities') }}" class="form-control"></textarea>
                </div>
                <div class="mb-3 center"> 
                    <!-- <label for="modern_education_qualifications">Modern Education Qualifications:</label> -->
                    <textarea id="modern_education_qualifications" name="modern_education_qualifications" placeholder="{{ __('messages.modern_education_qualifications') }}" class="form-control"></textarea>
                </div>
                <!-- <div class="mb-3 center">  -->
                    <button type="submit" class="btn btn-primary center form-control mx-auto d-block w-50">{{ __('messages.update') }}</button>
                <!-- </div> -->
            </form>
        </div>
    </div>
</div>

<script>
function editstudentform(gurukulId) {
    // Fetch the data via AJAX
    fetch(`/teacher/${gurukulId}/edit`)
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

            form.action = `/teacher/${gurukulId}/update`; 

        })
        .catch(error => console.error('Error fetching data:', error));
}
</script>
@endsection
