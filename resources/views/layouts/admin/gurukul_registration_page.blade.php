@extends('layouts.admin.sidebar')

@section('content')
<div class="innerPageWrapper">
    <div class="box mb-4">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#popupRegistration">
            {{ __('messages.add_new_school') }}
        </button>
    </div>
    <!-- Gurukul List Table -->
    <!-- <h1 class="text-center">{{ __('messages.gurukul_registration') }}</h1> -->
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
                        {{ __('messages.gurukul_name') }}
                    </th>
                    <th scope="col">
                        {{ __('messages.address') }}
                    </th>
                    <th scope="col">
                        {{ __('messages.mobile_number') }}
                    </th>
                    <th scope="col">
                        {{ __('messages.trust_name') }}
                    </th>
                    <th scope="col">
                        {{ __('messages.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($gurukuls as $registration)
                <tr>
                    <td>
                        {{ $registration->gurukul_name }}
                    </td>
                    <td class="addressField">
                        {{ $registration->address }}
                    </td>
                    <td>
                        {{ $registration->mobile_number }}
                    </td>
                    <td>
                        {{ $registration->trust_name }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#popupRegistrationedit" onclick="editstudentform({{ $registration->id }})">
                            {{ __('messages.edit') }}
                        </button>
                        <form action="{{ route('gurukul.destroy', $registration->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade addContentModal" id="popupRegistration" tabindex="-1" aria-labelledby="popupRegistrationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.gurukul_registration') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form id="gurukulForm" action="{{ route('gurukul.register') }}" method="POST" class="gurukul registration-content">
                            <div class="row">
                                @csrf
                                <!-- Hidden input to track whether it's edit or add -->
                                <!-- <input type="hidden" class="form-control" id="gurukul_id" name="gurukul_id" value=""> -->
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gurukul Name</label>
                                        <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password " class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>
                                        <label class="form-label">Address</label>
                                        <textarea id="address" class="form-control" name="address" class="form-control" placeholder="Address (including Pincode)" rows="3" required></textarea>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="role" name="role" placeholder="role " class="form-control" required>
                                <h5 class="my-3">Trust Information</h5>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" id="trust_name" class="form-control" name="trust_name" placeholder="Trust Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" placeholder="Trust Registration Date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="trust_president_name" name="trust_president_name" placeholder="Trust President Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="secretary_name" name="secretary_name" placeholder="Secretary Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="treasurer_name" name="treasurer_name" placeholder="Treasurer Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div>
                                        <input type="text" class="form-control" id="principal_name" name="principal_name" placeholder="Principal Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="my-3">Fund Resources</h5>
                                    <div class="mb-3">
                                        <select id="fund_resource" class="form-control" name="fund_resource" class="form-select form-control">
                                            <option value="education_board_support">education_board_support</option>
                                            <option value="government_support">government_support</option>
                                            <option value="private_donations">private_donations</option>
                                            <option value="donations_from_temples_and_mathas">donations_from_temples_and_mathas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="my-3">Type of Setup</h5>
                                    <div class="mb-3">
                                        <select id="type_of_setup" class="form-control" name="setup_type" class="form-select form-control">
                                            <option value="Pathshala">Pathshala</option>
                                            <option value="Gurukul">Gurukul</option>
                                            <option value="Tapovan">Tapovan</option>
                                            <option value="Gruh Gurukul">Gruh Gurukul</option>
                                            <option value="Adhunik Gurukul">Adhunik Gurukul</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="my-3">Focus Area of Gurukul</h5>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
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
                                </div>

                                <div class="col-12 col-md-6">
                                    <h5 class="my-3">Facilities Available</h5>
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
                                </div>

                                <div class="col-12 col-md-6">
                                    <h5 class="my-3">Registered with Education Board</h5>
                                    <div class="mb-3 radioBtnWrap">
                                        <input type="radio" id="registered_yes" name="registered_with_education_board" value="Yes" required>
                                        <label for="registered_yes">Yes</label><br>
                                        <input type="radio" id="registered_no" name="registered_with_education_board" value="No" required>
                                        <label for="registered_no">No</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mt-4">
                                    <div class="mb-3">
                                        <label for="education_board_name" class="form-label">If Yes, Name of the Education Board</label>
                                        <br>
                                        <input type="text" class="form-control" id="education_board_name" name="education_board_name" class="form-control">
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
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade addContentModal" id="popupRegistrationedit" tabindex="-1" aria-labelledby="popupRegistrationeditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.gurukul_registration') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form id="gurukulForms" action="{{ route('gurukul.register') }}" method="POST" class="gurukul registration-content">
                        <div class="row">
                            @csrf
                            <!-- Hidden input to track whether it's edit or add -->
                            <input type="hidden" class="form-control" id="gurukul_id" name="gurukul_id" value="">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gurukul Name</label>
                                    <input type="text" class="form-control" id="gurukul_name" name="gurukul_name" placeholder="Gurukul Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div>
                                    <label class="form-label">Address</label>
                                    <textarea id="address" class="form-control" name="address" class="form-control" placeholder="Address (including Pincode)" rows="3" required></textarea>
                                </div>
                            </div>
                            <h5 class="my-3">Trust Information</h5>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" id="trust_name" class="form-control" name="trust_name" placeholder="Trust Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="trust_registration_date" name="trust_registration_date" placeholder="Trust Registration Date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="trust_president_name" name="trust_president_name" placeholder="Trust President Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="secretary_name" name="secretary_name" placeholder="Secretary Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="treasurer_name" name="treasurer_name" placeholder="Treasurer Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div>
                                    <input type="text" class="form-control" id="principal_name" name="principal_name" placeholder="Principal Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="my-3">Fund Resources</h5>
                                <div class="mb-3">
                                    <select id="fund_resource" class="form-control" name="fund_resource" class="form-select form-control">
                                        <option value="education_board_support">education_board_support</option>
                                        <option value="government_support">government_support</option>
                                        <option value="private_donations">private_donations</option>
                                        <option value="donations_from_temples_and_mathas">donations_from_temples_and_mathas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 class="my-3">Type of Setup</h5>
                                <div class="mb-3">
                                    <select id="type_of_setup" class="form-control" name="setup_type" class="form-select form-control">
                                        <option value="Pathshala">Pathshala</option>
                                        <option value="Gurukul">Gurukul</option>
                                        <option value="Tapovan">Tapovan</option>
                                        <option value="Gruh Gurukul">Gruh Gurukul</option>
                                        <option value="Adhunik Gurukul">Adhunik Gurukul</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="my-3">Focus Area of Gurukul</h5>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
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
                            </div>

                            <div class="col-12 col-md-6">
                                <h5 class="my-3">Facilities Available</h5>
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
                            </div>

                            <div class="col-12 col-md-6">
                                <h5 class="my-3">Registered with Education Board</h5>
                                <div class="mb-3 radioBtnWrap">
                                    <input type="radio" id="registered_yes" name="registered_with_education_board" value="Yes" required>
                                    <label for="registered_yes">Yes</label><br>
                                    <input type="radio" id="registered_no" name="registered_with_education_board" value="No" required>
                                    <label for="registered_no">No</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mt-4">
                                <div class="mb-3">
                                    <label for="education_board_name" class="form-label">If Yes, Name of the Education Board</label>
                                    <br>
                                    <input type="text" class="form-control" id="education_board_name" name="education_board_name" class="form-control">
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
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<script>
    function editstudentform(gurukulId) {
        // Fetch the data via AJAX
        fetch(`/admin/gurukul/${gurukulId}/edit`)
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
                console.log(facilitiesArray, 'facilitiesArray');
                // Loop through the checkboxes and set their checked property
                document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                    // Check if the checkbox value is in the facilitiesArray
                    if (facilitiesArray.includes(checkbox.value)) {
                        checkbox.checked = true; // Set checkbox as checked
                        console.log(checkbox, 'facilitiesArray1111');
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
                form.action = `/admin/gurukul/${data.id}/update`;

            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>
@endsection