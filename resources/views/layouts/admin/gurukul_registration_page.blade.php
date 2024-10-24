@extends('layouts.admin.sidebar')

@section('content')
<div class="container">
    <div class="box">
        <a class="btn btn-primary" href="#popup1" onclick="('add')">{{ __('messages.add_new_school') }}</a>
    </div>
   <!-- Gurukul List Table -->
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
                        <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" class="form-control" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3 center">
                        <textarea id="address" class="form-control" name="address" class="form-control" placeholder="Address (including Pincode)" rows="3" required></textarea>
                    </div>

                    <!-- Mobile Number -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" class="form-control" required>
                    </div>

                    <!-- email -->
                    <div class="mb-3 center">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" class="form-control" required>
                    </div>

                    <!-- password -->
                    <div class="mb-3 center">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password " class="form-control" required>
                    </div>

                    <!-- role -->
                        <!-- <input type="hidden" class="form-control" id="role" name="role" placeholder="role " class="form-control" required> -->

                    <h3 class="center">Trust Information</h3>

                    <!-- Trust Name -->
                    <div class="mb-3 center">
                        <input type="text" id="trust_name" class="form-control" name="trust_name" placeholder="Trust Name" class="form-control" required>
                    </div>

                    <!-- Trust Registration Date -->
                    <div class="mb-3 center">
                        <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" placeholder="Trust Registration Date" class="form-control" required>
                    </div>

                    <!-- Trust President Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="trust_president_name" name="trust_president_name" placeholder="Trust President Name" class="form-control" required>
                    </div>

                    <!-- Secretary Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="secretary_name" name="secretary_name" placeholder="Secretary Name" class="form-control" required>
                    </div>

                    <!-- Treasurer Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="treasurer_name" name="treasurer_name" placeholder="Treasurer Name" class="form-control" required>
                    </div>

                    <!-- Principal Name -->
                    <div class="mb-3 center">
                        <input type="text" class="form-control" id="principal_name" name="principal_name" placeholder="Principal Name" class="form-control" required>
                    </div>

                    <h3 class="center">Fund Resources</h3>
                    <!-- Type of Setup -->
                    <div class="mb-3 center">
                        <select id="fund_resource" class="form-control" name="fund_resource" class="form-select form-control">
                            <option value="education_board_support">education_board_support</option>
                            <option value="government_support">government_support</option>
                            <option value="private_donations">private_donations</option>
                            <option value="donations_from_temples_and_mathas">donations_from_temples_and_mathas</option>
                        </select>
                    </div>

                    <h3 class="center">Type of Setup</h3>

                    <!-- Type of Setup -->
                    <div class="mb-3 center">
                        <select id="type_of_setup" class="form-control" name="setup_type" class="form-select form-control">
                            <option value="Pathshala">Pathshala</option>
                            <option value="Gurukul">Gurukul</option>
                            <option value="Tapovan">Tapovan</option>
                            <option value="Gruh Gurukul">Gruh Gurukul</option>
                            <option value="Adhunik Gurukul">Adhunik Gurukul</option>
                        </select>
                    </div>

                    <h3 class="center">Focus Area of Gurukul</h3>

                    <!-- Focus Area of Gurukul -->
                    <div class="mb-3 center">
                        <select id="focus_area" class="form-control" name="focus_area[]" class="form-select form-control" multiple>
                            <option value="Ved">Ved</option>
                            <option value="Shastra Gurukul">Shastra Gurukul</option>
                            <option value="Kala">Kala</option>
                            <option value="Krishi">Krishi</option>
                            <option value="Yog-Darshan">Yog-Darshan</option>
                            <option value="Tantra">Tantra</option>
                            <option value="Yudh Kala">Yudh Kala</option>
                            <option value="Bhasha">Bhasha</option>
                        </select>
                    </div>

                    <h3 class="center">Facilities Available</h3>

                    <!-- Facilities Available (checkboxes) -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="School_Building" name="facilities[]" value="School Building">
                        <label class="form-check-label" for="School_Building">School Building</label><br>
                        <input class="form-check-input" type="checkbox" id="Classrooms" name="facilities[]" value="Classrooms">
                        <label class="form-check-label" for="Classrooms">Classrooms</label><br>
                        <input class="form-check-input" type="checkbox" id="Library" name="facilities[]" value="Library">
                        <label class="form-check-label" for="Library">Library</label><br>
                        <input class="form-check-input" type="checkbox" id="ComputerRoom" name="facilities[]" value="Computer Room">
                        <label class="form-check-label" for="ComputerRoom">Computer Room</label><br>
                        <input class="form-check-input" type="checkbox" id="Kala_Room" name="facilities[]" value="Kala Room">
                        <label class="form-check-label" for="Kala_Room">Kala Room</label><br>
                        <input class="form-check-input" type="checkbox" id="Vyam_Kasha" name="facilities[]" value="Vyam Kasha">
                        <label class="form-check-label" for="Vyam_Kasha">Vyam Kasha</label><br>
                        <input class="form-check-input" type="checkbox" id="Farms" name="facilities[]" value="Farms">
                        <label class="form-check-label" for="Farms">Farms</label><br>
                        <input class="form-check-input" type="checkbox" id="Kitchen" name="facilities[]" value="Kitchen">
                        <label class="form-check-label" for="Kitchen">Kitchen</label><br>
                        <input class="form-check-input" type="checkbox" id="Ashwashala" name="facilities[]" value="Ashwashala">
                        <label class="form-check-label" for="Ashwashala">Ashwashala</label><br>
                        <input class="form-check-input" type="checkbox" id="Workshop" name="facilities[]" value="Workshop">
                        <label class="form-check-label" for="Workshop">Workshop</label><br>
                        <input class="form-check-input" type="checkbox" id="Yagna_Shala" name="facilities[]" value="Yagna Shala">
                        <label class="form-check-label" for="Yagna_Shala">Yagna Shala</label><br>
                    </div>

                    <h3 class="center">Registered with Education Board</h3>

                    <!-- Registered with Education Board (Yes/No radio buttons) -->
                    <div class="mb-3 center">
                        <input type="radio" id="registered_yes" name="registered_with_education_board" value="Yes" required>
                        <label for="registered_yes">Yes</label><br>
                        <input type="radio" id="registered_no" name="registered_with_education_board" value="No" required>
                        <label for="registered_no">No</label>
                    </div>

                    <!-- If Yes, Name of the Education Board -->
                    <div class="mb-3 center">
                        <label for="education_board_name" class="form-label">If Yes, Name of the Education Board</label>
                        <br>
                        <input type="text" class="form-control" id="education_board_name" name="education_board_name" class="form-control">
                    </div>

                    <button type="submit" id="submit-button" class="btn btn-primary center form-control w-50 mx-auto d-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="popup2" class="overlay">
    <div class="popup">
        <h1 class="text-center" id="form-title">  {{ $title }}</h1>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="gurukulForms" action="{{ route('gurukul.register') }}" method="POST" class="gurukul registration form-control mx-auto w-75 mt-3">
                @csrf
                <!-- Hidden input to track whether it's edit or add -->
                <input type="hidden" id="gurukul_ids" name="gurukul_id" value="">

                <!-- Gurukul Name -->
                <div class="mb-3 center">
                    <input type="text" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" class="form-control" value="" required>
                </div>

                <!-- Address -->
                <div class="mb-3 center">
                    <textarea id="address" name="address" class="form-control" placeholder="Address (including)" rows="3" value="" required></textarea>
                </div>

                <!-- Mobile Number -->
                <div class="mb-3 center">
                    <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number" class="form-control" value="" required>
                </div>

                <h3 class="center">Trust Information</h3>

                <!-- Trust Name -->
                <div class="mb-3 center">
                    <!-- <label for="trust_name" class="form-label">Trust Name</label> -->
                    <input type="text" id="trust_name" name="trust_name" placeholder="Trust Name" class="form-control" required>
                </div>

                <!-- Trust Registration Date -->
                <div class="mb-3 center">
                    <!-- <label for="trust_registration_date" class="form-label">Trust Registration Date</label> -->
                    <input type="date" id="trust_registration_date" name="trust_registration_date" placeholder="Trust Registration Date" class="form-control" required>
                </div>

                <!-- Trust President Name -->
                <div class="mb-3 center">
                    <!-- <label for="trust_president_name" class="form-label">Trust President Name</label> -->
                    <input type="text" id="trust_president_name" name="trust_president_name" placeholder="Trust President Name" class="form-control" required>
                </div>

                <!-- Secretary Name -->
                <div class="mb-3 center">
                    <!-- <label for="secretary_name" class="form-label">Secretary Name</label> -->
                    <input type="text" id="secretary_name" name="secretary_name" placeholder="Secretary Name" class="form-control" required>
                </div>

                <!-- Treasurer Name -->
                <div class="mb-3 center">
                    <!-- <label for="treasurer_name" class="form-label">Treasurer Name</label> -->
                    <input type="text" id="treasurer_name" name="treasurer_name" placeholder="Treasurer Name" class="form-control" required>
                </div>

                <!-- Principal Name -->
                <div class="mb-3 center">
                    <!-- <label for="principal_name" class="form-label">Principal Name</label> -->
                    <input type="text" id="principal_name" name="principal_name" placeholder="Principal Name" class="form-control" required>
                </div>

                <h3 class="center">Fund Resources</h3>
                <div class="mb-3 center">
                    <select id="fund_resource" class="form-control" name="fund_resource" class="form-select form-control">
                        <option value="education_board_support">education_board_support</option>
                        <option value="government_support">government_support</option>
                        <option value="private_donations">private_donations</option>
                        <option value="donations_from_temples_and_mathas">donations_from_temples_and_mathas</option>
                    </select>
                </div>

                <h3 class="center">Type of Setup</h3>

                <!-- Type of Setup -->
                <div class="mb-3 center">
                    <!-- <label for="type_of_setup" class="form-label">Type of Setup</label> -->
                    <select id="type_of_setups" name="setup_type" class="form-select form-control">
                        <option value="Pathshala">Pathshala</option>
                        <option value="Gurukul">Gurukul</option>
                        <option value="Tapovan">Tapovan</option>
                        <option value="Gruh Gurukul">Gruh Gurukul</option>
                        <option value="Adhunik Gurukul">Adhunik Gurukul</option>
                    </select>
                </div>

                <h3 class="center">Focus Area of Gurukul</h3>

                <!-- Focus Area of Gurukul -->
                <div class="mb-3 center">
                    <!-- <label for="focus_area" class="form-label">Focus Area of Gurukul</label> -->
                    <select id="focus_areas" name="focus_area[]" class="form-select form-control" multiple>
                        <option value="Ved">Ved</option>
                        <option value="Shastra Gurukul">Shastra Gurukul</option>
                        <option value="Kala">Kala</option>
                        <option value="Krishi">Krishi</option>
                        <option value="Yog-Darshan">Yog-Darshan</option>
                        <option value="Tantra">Tantra</option>
                        <option value="Yudh Kala">Yudh Kala</option>
                        <option value="Bhasha">Bhasha</option>
                    </select>
                </div>

                <h3 class="center">Facilities Available</h3>

                <!-- Facilities Available (checkboxes) -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="School_Building" name="facilities[]" value="School Building">
                    <label class="form-check-label" for="School_Building">School Building</label><br>
                    <input class="form-check-input" type="checkbox" id="Classrooms" name="facilities[]" value="Classrooms">
                    <label class="form-check-label" for="Classrooms">Classrooms</label><br>
                    <input class="form-check-input" type="checkbox" id="Library" name="facilities[]" value="Library">
                    <label class="form-check-label" for="Library">Library</label><br>
                    <input class="form-check-input" type="checkbox" id="ComputerRoom" name="facilities[]" value="Computer Room">
                    <label class="form-check-label" for="ComputerRoom">Computer Room</label><br>
                    <input class="form-check-input" type="checkbox" id="Kala_Room" name="facilities[]" value="Kala Room">
                    <label class="form-check-label" for="Kala_Room">Kala Room</label><br>
                    <input class="form-check-input" type="checkbox" id="Vyam_Kasha" name="facilities[]" value="Vyam Kasha">
                    <label class="form-check-label" for="Vyam_Kasha">Vyam Kasha</label><br>
                    <input class="form-check-input" type="checkbox" id="Farms" name="facilities[]" value="Farms">
                    <label class="form-check-label" for="Farms">Farms</label><br>
                    <input class="form-check-input" type="checkbox" id="Kitchen" name="facilities[]" value="Kitchen">
                    <label class="form-check-label" for="Kitchen">Kitchen</label><br>
                    <input class="form-check-input" type="checkbox" id="Ashwashala" name="facilities[]" value="Ashwashala">
                    <label class="form-check-label" for="Ashwashala">Ashwashala</label><br>
                    <input class="form-check-input" type="checkbox" id="Workshop" name="facilities[]" value="Workshop">
                    <label class="form-check-label" for="Workshop">Workshop</label><br>
                    <input class="form-check-input" type="checkbox" id="Yagna_Shala" name="facilities[]" value="Yagna Shala">
                    <label class="form-check-label" for="Yagna_Shala">Yagna Shala</label><br>
                </div>

                <h3 class="center">Registered with Education Board</h3>

                <!-- Registered with Education Board (Yes/No radio buttons) -->
                <div class="mb-3 center">
                    <!-- <label class="form-label">Registered with Education Board</label><br> -->
                    <input type="radio" id="registered_yess" name="registered_with_education_board" value="Yes" required>
                    <label for="registered_yes">Yes</label><br>
                    <input type="radio" id="registered_nos" name="registered_with_education_board" value="No" required>
                    <label for="registered_no">No</label>
                </div>

                <!-- If Yes, Name of the Education Board -->
                <div class="mb-3 center">
                    <label for="education_board_name" class="form-label">If Yes, Name of the Education Board</label>
                    <br>
                    <input type="text" id="education_board_names" name="education_board_name" class="form-control">
                </div>

                <button type="submit" id="submit-buttons" class="btn btn-primary center mx-auto d-block w-50 form-control">Update</button>
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

            // Assuming data.Facilities is an array of selected facilities
            const facilitiesArray = data.facilities.split(', ').map(facility => facility.trim());
            console.log(facilitiesArray,'facilitiesArray');
            // Loop through the checkboxes and set their checked property
            document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                // Check if the checkbox value is in the facilitiesArray
                if (facilitiesArray.includes(checkbox.value)) {
                    checkbox.checked = true; // Set checkbox as checked
                    console.log(checkbox,'facilitiesArray1111');
                } else {
                    checkbox.checked = false; // Optional: explicitly uncheck others
                }
            });

            // Populate the fund resource select field
            const fundResourceSelect = form.querySelector('#fund_resource');
            fundResourceSelect.value = data.fund_resource; // Assuming `fund_resource` is returned in the fetched data

            // Populate the setup type select field
            const setupTypeSelect = form.querySelector('#type_of_setups');
            setupTypeSelect.value = data.setup_type; // Assuming `setup_type` is returned in the fetched data

            // Populate the focus area multiple select field
            const focusAreasSelect = form.querySelector('#focus_areas');
            const selectedFocusAreas = data.focus_area; // Assuming `focus_area` is an array in the fetched data
            for (let option of focusAreasSelect.options) {
                option.selected = selectedFocusAreas.includes(option.value);
            }

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