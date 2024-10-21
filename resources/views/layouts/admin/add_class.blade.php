@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="box">
        <a class="btn btn-primary" href="#popup1" onclick="('add')">Add class</a>
    </div>
   <!-- Gurukul List Table -->
   <h1 class="text-center">Add New class</h1>
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
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Std_class
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($std_class as $registration)
            <tr class="">
                <td class="">
                {{ $registration->id }}
                </td>
                <td class="px-6 py-4">
                {{ $registration->std_classes }}
                </td>
                <td class="px-6 py-4">
                    <a href="#popup2" class="edit-gurukul btn btn-primary" onclick="editstudentform({{ $registration->id }})">Edit</a>
                    <form action="{{ route('class.delete', $registration->id) }}" method="POST" style="display:inline;">
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
        <h1 class="text-center" id="form-title">Add New Class Page</h1>
        <a class="close mb-3" href="#">&times;</a>
        <div class="content">
            <form id="addnewclass" action="{{ route('class.create') }}" method="POST" class="gurukul registration row g-3 mt-3 form-control w-75 mx-auto">
                @csrf
                <!-- If Yes, Name of the Education Board -->
                <div class="mb-3 center">
                    <label for="education_board_name" class="form-label">Add new class</label>
                    <br>
                    <input type="text" class="form-control" id="std_classes" name="std_classes" placeholder="std_classes" class="form-control">
                </div>

                <button type="submit" id="submit-button" class="btn btn-primary center form-control w-50 mx-auto d-block">Submit</button>
            </form>
        </div>
    </div>
</div>

<div id="popup2" class="overlay">
    <div class="popup">
        <h1 class="text-center" id="form-title">Add New Class Page</h1>
        <a class="close mb-3" href="#">&times;</a>
        <div class="content">
            <form id="addnewclasss" action="{{ route('class.create') }}" method="POST" class="gurukul registration row g-3 mt-3 form-control w-75 mx-auto">
                @csrf
                <!-- If Yes, Name of the Education Board -->
                <div class="mb-3 center">
                    <label for="education_board_name" class="form-label">Add new class</label>
                    <br>
                    <input type="hidden" id="gurukul_ids" name="gurukul_id" value="">
                    <input type="text" class="form-control" id="std_classes" name="std_classes" placeholder="std_classes" class="form-control">
                </div>

                <button type="submit" id="submit-button" class="btn btn-primary center form-control w-50 mx-auto d-block">update</button>
            </form>
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