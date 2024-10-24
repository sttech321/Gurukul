@extends('layouts.admin.sidebar')

@section('content')
<div class="innerPageWrapper">
    <div class="box mb-4">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addPopupRegistration">
            Add class
        </button>
    </div>
    <!-- Gurukul List Table -->
    <!-- <h1 class="text-center">Add New class</h1> -->
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
                        Id
                    </th>
                    <th scope="col">
                        Std_class
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($std_class as $registration)
                <tr class="">
                    <td>
                        {{ $registration->id }}
                    </td>
                    <td>
                        {{ $registration->std_classes }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="editstudentform({{ $registration->id }})" data-bs-target="#addPopupRegistration2">
                            Edit
                        </button>
                        <form action="{{ route('class.delete', $registration->id) }}" method="POST" style="display:inline;">
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

    <div class="modal fade addContentModal" id="addPopupRegistration" tabindex="-1" aria-labelledby="addPopupRegistrationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Class Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form id="addnewclass" action="{{ route('class.create') }}" method="POST" class="gurukul registration-content">
                            <div class="row">
                                @csrf
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Add new class</label>
                                        <input type="text" class="form-control" id="std_classes" name="std_classes" placeholder="std_classes" class="form-control">
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

    <div class="modal fade addContentModal" id="addPopupRegistration2" tabindex="-1" aria-labelledby="addPopupRegistration2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Class Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <form id="addnewclasss" action="{{ route('class.create') }}" method="POST" class="gurukul registration-content">
                            <div class="row">
                                @csrf
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Add new class</label>
                                        <input type="hidden" id="gurukul_ids" name="gurukul_id" value="">
                                        <input type="text" class="form-control" id="std_classes" name="std_classes" placeholder="std_classes" class="form-control">
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

</div>
<script>
    function editstudentform(gurukulId) {
        // Fetch the data via AJAX
        fetch(`/class/edit/${gurukulId}`)
            .then(response => response.json())
            .then(data => {
                // Get the form element
                const form = document.getElementById('addnewclasss');
                form.querySelector('#gurukul_ids').value = data.id;
                form.querySelector('#std_classes').value = data.std_classes;
                form.action = `/class/update/${data.id}`;

            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>
@endsection