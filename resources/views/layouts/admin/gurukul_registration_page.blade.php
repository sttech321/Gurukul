@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="box">
        <a class="btn btn-primary" href="#popup1" onclick="('add')">{{ __('messages.add_new_school') }}</a>
    </div>
   <!-- Gurukul List Table -->
   <h1 class="text-center">{{ __('messages.gurukul_registration') }}</h1>
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
        <table class="table table-striped mt-3">
            <thead class="">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.gurukul_name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.address') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.mobile_number') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.trust_name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($gurukuls as $registration)
                <tr class="">
                    <td class="">
                    {{ $registration->gurukul_name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->address }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->mobile_number }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $registration->trust_name }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#popup2" class="edit-gurukul btn btn-primary" onclick="editstudentform({{ $registration->id }})">{{ __('messages.edit') }}</a>
                        <form action="{{ route('gurukul.destroy', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h2 class="text-center">{{ __('messages.gurukul_registration') }}</h2>
            <a class="close mb-3" href="#">&times;</a>
            <div class="content">
                <form id="gurukulForm" action="{{ route('gurukul.register') }}" method="POST" class="gurukul registration row g-3 mt-3 form-control w-75 mx-auto">
                    @csrf
                    <!-- Hidden input to track whether it's edit or add -->
                    <input type="hidden" class="form-control" id="gurukul_id" name="gurukul_id" value="">
                
                    <!-- Gurukul Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="{{ __('messages.gurukul_name') }}" required>
                    </div>
                
                    <!-- Address -->
                    <div class="mb-3 center">
                        <textarea id="address" class="form-control" name="address" placeholder="{{ __('messages.address') }}" rows="3" required></textarea>
                    </div>
                
                    <!-- Mobile Number -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="{{ __('messages.mobile_number') }}" required>
                    </div>
                
                    <h3 class="center">{{ __('messages.trust_name') }}</h3>
                
                    <!-- Trust Name -->
                    <div class="mb-3 center">
                        <input type="text" id="trust_name" class="form-control" name="trust_name" placeholder="{{ __('messages.trust_name') }}" required>
                    </div>
                
                    <!-- Trust Registration Date -->
                    <div class="mb-3 center">
                        <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" placeholder="{{ __('messages.trust_registration_date') }}" required>
                    </div>
                
                    <!-- Trust President Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="trust_president_name" name="trust_president_name" placeholder="{{ __('messages.trust_president_name') }}" required>
                    </div>
                
                    <!-- Secretary Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="secretary_name" name="secretary_name" placeholder="{{ __('messages.secretary_name') }}" required>
                    </div>
                
                    <!-- Treasurer Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="treasurer_name" name="treasurer_name" placeholder="{{ __('messages.treasurer_name') }}" required>
                    </div>
                
                    <!-- Principal Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="principal_name" name="principal_name" placeholder="{{ __('messages.principal_name') }}" required>
                    </div>
                
                    <h3 class="center">{{ __('messages.type_of_setup') }}</h3>
                
                    <!-- Type of Setup -->
                    <div class="mb-3 center">
                        <select id="type_of_setup" class="form-control" name="setup_type">
                            @foreach(__('messages.setup_type_options') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                
                    <h3 class="center">{{ __('messages.focus_area') }}</h3>
                
                    <!-- Focus Area of Gurukul -->
                    <div class="mb-3 center">
                        <select id="focus_area" class="form-control" name="focus_area[]" multiple>
                            @foreach(__('messages.focus_area_options') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                
                    <h3 class="center">{{ __('messages.facilities_available') }}</h3>
                
                    <!-- Facilities Available (checkboxes) -->
                    <div class="mb-3 center">
                        @php
                        $facilities = ['School Building', 'Classrooms', 'Library', 'Computer Room', 'Kala Room', 'Vyam Kasha', 'Farms', 'Kitchen', 'Gaushala', 'Ashwashala', 'Workshop', 'Yagna Shala'];
                        @endphp
                
                        @foreach($facilities as $facility)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{ strtolower(str_replace(' ', '_', $facility)) }}" name="facilities[]" value="{{ $facility }}">
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '_', $facility)) }}">{{$facility}}</label>
                            </div>
                        @endforeach
                    </div>
                
                    <h3 class="center">{{ __('messages.registered_with_education_board') }}</h3>
                
                    <!-- Registered with Education Board (Yes/No radio buttons) -->
                    <div class="mb-3 center">
                        <input type="radio" id="registered_yes" name="registered_with_education_board" value="Yes" required>
                        <label for="registered_yes">{{ __('messages.yes') }}</label><br>
                        <input type="radio" id="registered_no" name="registered_with_education_board" value="No" required>
                        <label for="registered_no">{{ __('messages.no') }}</label>
                    </div>
                
                    <!-- If Yes, Name of the Education Board -->
                    <div class="mb-3 center">
                        <label for="education_board_name" class="form-label">{{ __('messages.if_yes_name_of_education_board') }}</label>
                        <input type="text" class="form-control" id="education_board_name" name="education_board_name">
                    </div>
                
                    <button type="submit" id="submit-button" class="btn btn-primary center form-control w-50 mx-auto d-block">{{ __('messages.submit') }}</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

<div id="popup2" class="overlay">
    <div class="popup">
        <h1 class="text-center" id="form-title">{{ __('messages.gurukul_update_page') }}</h1>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="gurukulForms" action="{{ route('gurukul.register') }}" method="POST" class="gurukul registration form-control mx-auto w-75 mt-3">
                @csrf
                <!-- Gurukul Name -->
                <div class="mb-3 center">
                    <input type="text" id="gurukul_name" name="gurukul_name" placeholder="{{ __('messages.gurukul_name') }}" class="form-control" value="" required>
                </div>

                <!-- Address -->
                <div class="mb-3 center">
                    <textarea id="address" name="address" class="form-control" placeholder="{{ __('messages.address') }}" rows="3" value="" required></textarea>
                </div>

                <!-- Mobile Number -->
                <div class="mb-3 center">
                    <input type="text" id="mobile_number" name="mobile_number" placeholder="{{ __('messages.mobile_number') }}" class="form-control" value="" required>
                </div>

                <h3 class="center">{{ __('messages.trust_name') }}</h3>

                <!-- Trust Name -->
                <div class="mb-3 center">
                    <!-- <label for="trust_name" class="form-label">Trust Name</label> -->
                    <input type="text" id="trust_name" name="trust_name" placeholder="{{ __('messages.trust_name') }}" class="form-control" required>
                </div>

                <!-- Trust Registration Date -->
                <div class="mb-3 center">
                    <!-- <label for="trust_registration_date" class="form-label">Trust Registration Date</label> -->
                    <input type="date" id="trust_registration_date" name="trust_registration_date" placeholder="{{ __('messages.trust_registration_date') }}" class="form-control" required>
                </div>

                <!-- Trust President Name -->
                <div class="mb-3 center">
                    <!-- <label for="trust_president_name" class="form-label">Trust President Name</label> -->
                    <input type="text" id="trust_president_name" name="trust_president_name" placeholder="{{ __('messages.trust_president_name') }}" class="form-control" required>
                </div>

                <!-- Secretary Name -->
                <div class="mb-3 center">
                    <!-- <label for="secretary_name" class="form-label">Secretary Name</label> -->
                    <input type="text" id="secretary_name" name="secretary_name" placeholder="{{ __('messages.secretary_name') }}" class="form-control" required>
                </div>

                <!-- Treasurer Name -->
                <div class="mb-3 center">
                    <!-- <label for="treasurer_name" class="form-label">Treasurer Name</label> -->
                    <input type="text" id="treasurer_name" name="treasurer_name" placeholder="{{ __('messages.treasurer_name') }}" class="form-control" required>
                </div>

                <!-- Principal Name -->
                <div class="mb-3 center">
                    <!-- <label for="principal_name" class="form-label">Principal Name</label> -->
                    <input type="text" id="principal_name" name="principal_name" placeholder="{{ __('messages.principal_name') }}" class="form-control" required>
                </div>

                <h3 class="center">{{ __('messages.type_of_setup') }}</h3>

                <!-- Education Board Support -->
                <div class="mb-3 center">
                    <!-- <label for="education_board_support" class="form-label">Education Board Support</label> -->
                    <input type="text" id="education_board_support" name="education_board_support" placeholder="Education Board Support" class="form-control">
                </div>

                <!-- Government Support -->
                <div class="mb-3 center">
                    <!-- <label for="government_support" class="form-label">Government Support</label> -->
                    <input type="text" id="government_support" name="government_support" placeholder="Government Support" class="form-control">
                </div>

                <!-- Private Donations -->
                <div class="mb-3 center">
                    <!-- <label for="private_donations" class="form-label">Private Donations</label> -->
                    <input type="text" id="private_donations" name="private_donations" placeholder="Private Donations" class="form-control">
                </div>

                <!-- Donations from Temples and Mathas -->
                <div class="mb-3 center">
                    <!-- <label for="temples_donations" class="form-label">Donations from Temples and Mathas</label> -->
                    <input type="text" id="temples_donations" name="donations_from_temples_and_mathas" placeholder="Donations from Temples and Mathas" class="form-control">
                </div>

                <h3 class="center">{{ __('messages.type_of_setup') }}</h3>

                <!-- Type of Setup -->
                <div class="mb-3 center">
                    <select id="type_of_setup" class="form-control" name="setup_type">
                        @foreach(__('messages.setup_type_options') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    </select>
                </div>

                <h3 class="center">{{ __('messages.focus_area') }}</h3>

                <!-- Focus Area of Gurukul -->
                <div class="mb-3 center">
                    <select id="focus_area" class="form-control" name="focus_area[]" multiple>
                        @foreach(__('messages.focus_area_options') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    </select>
                </div>

                <h3 class="center">Facilities Available</h3>

                <!-- Facilities Available (checkboxes) -->
                <div class="mb-3 center">
                    <!-- <label class="form-label">Facilities Available</label><br> -->

                    @php
                    $facilities = ['School Building', 'Classrooms', 'Library', 'Computer Room', 'Kala Room', 'Vyam Kasha', 'Farms', 'Kitchen', 'Gaushala', 'Ashwashala', 'Workshop', 'Yagna Shala'];
                    @endphp

                    @foreach($facilities as $facility)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="{{ strtolower(str_replace(' ', '_', $facility)) }}" name="facilities[]" value="{{ $facility }}">
                            <label class="form-check-label" for="{{ strtolower(str_replace(' ', '_', $facility)) }}">{{ $facility }}</label>
                        </div>
                    @endforeach
                </div>

                <h3 class="center">{{ __('messages.registered_with_education_board') }}</h3>

                <!-- Registered with Education Board (Yes/No radio buttons) -->
                <div class="mb-3 center">
                    <!-- <label class="form-label">Registered with Education Board</label><br> -->
                    <input type="radio" id="registered_yess" name="registered_with_education_board" value="Yes" required>
                    <label for="registered_yes">{{ __('messages.yes') }}</label><br>
                    <input type="radio" id="registered_nos" name="registered_with_education_board" value="No" required>
                    <label for="registered_no">{{ __('messages.no') }}</label>
                </div>

                <!-- If Yes, Name of the Education Board -->
                <div class="mb-3 center">
                    <label for="education_board_name" class="form-label">{{ __('messages.if_yes_name_of_education_board') }}</label>
                    <br>
                    <input type="text" id="education_board_names" name="education_board_name" class="form-control">
                </div>

                <button type="submit" id="submit-buttons" class="btn btn-primary center mx-auto d-block w-50 form-control">{{ __('messages.update') }}</button>
            </form>
        </div>
    </div>
</div>

<script>
function editstudentform(gurukulId) {
    // Fetch the data via AJAX
    fetch(`/gurukul/${gurukulId}/edit`)
        .then(response => response.json())
        .then(data => {
            // Get the form element
            const form = document.getElementById('gurukulForms');

            // Populate the form fields with the fetched data
            form.querySelector('#gurukul_ids').value = data.id;
            form.querySelector('#gurukul_name').value = data.gurukul_name;
            form.querySelector('#address').value = data.address;
            form.querySelector('#mobile_number').value = data.mobile_number;
            form.querySelector('#trust_name').value = data.trust_name;
            form.querySelector('#trust_registration_date').value = data.trust_registration_date;
            form.querySelector('#trust_president_name').value = data.trust_president_name;
            form.querySelector('#secretary_name').value = data.secretary_name;
            form.querySelector('#treasurer_name').value = data.treasurer_name;
            form.querySelector('#principal_name').value = data.principal_name;
            form.querySelector('#education_board_support').value = data.education_board_support;
            form.querySelector('#government_support').value = data.government_support;
            form.querySelector('#private_donations').value = data.private_donations;
            form.querySelector('#temples_donations').value = data.donations_from_temples_and_mathas;
            // Populate the setup type select field
            const setupTypeSelect = form.querySelector('#type_of_setups');
            setupTypeSelect.value = data.setup_type; // Assuming `setup_type` is returned in the fetched data

            // Populate the focus area multiple select field
            const focusAreasSelect = form.querySelector('#focus_areas');
            const selectedFocusAreas = data.focus_area; // Assuming `focus_area` is an array in the fetched data
            for (let option of focusAreasSelect.options) {
                option.selected = selectedFocusAreas.includes(option.value);
            }

            // Populate the facilities checkboxes
            const facilities = ['School Building', 'Classrooms', 'Library', 'Computer Room', 'Kala Room', 'Vyam Kasha', 'Farms', 'Kitchen', 'Gaushala', 'Ashwashala', 'Workshop', 'Yagna Shala'];
            facilities.forEach(facility => {
                const checkbox = form.querySelector(`#${facility.toLowerCase().replace(/ /g, '_')}`);
                checkbox.checked = data.facilities ? data.facilities.includes(facility) : false; // Check if facility is in the data
            });

            // Populate the registered with education board radio buttons
            if (data.registered_with_education_board === 'Yes') {
                form.querySelector('#registered_yess').checked = true;
            } else {
                form.querySelector('#registered_nos').checked = true;
            }

            // Populate the education board name input
            form.querySelector('#education_board_names').value = data.education_board_name || '';
            form.action = `/gurukul/${data.id}/update`; 

        })
        .catch(error => console.error('Error fetching data:', error));
}
</script>
@endsection