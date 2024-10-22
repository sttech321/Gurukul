@extends('layouts.admin.sidebar')
@section('content')
<div class="container mx-auto p-6">
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Issue A New Book</a></li>
    <li><a href="#tabs-2">Add New Book</a></li>
    <!-- <li><a href="#tabs-3">Aenean lacinia</a></li> -->
  </ul>
  <div id="tabs-1">

    <div class="container">
        <h2 class="text-center">Issue a New Book</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('book-issues.store') }}" method="POST" class="form-control">
            @csrf

            <!-- Select Book -->
            <div class="form-group">
                <label for="book_id">Book</label><br>
                <select name="book_id" class="form-control" id="book_id" required>
                    <option value="">Select a Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- ISBN -->
            <div class="form-group">
                <label for="isbn">ISBN</label><br>
                <input type="text" name="isbn" class="form-control" id="isbn" value="{{ old('isbn') }}" required>
            </div>

            <!-- Select User -->
            <div class="form-group">
                <label for="user_id">User</label><br>
                <select name="user_id" class="form-control" id="user_id" required>
                    <option value="">Select a User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Issue Date -->
            <div class="form-group">
                <label for="issue_date">Issue Date</label><br>
                <input type="date" name="issue_date" class="form-control" id="issue_date" value="{{ old('issue_date') }}" required>
            </div>

            <!-- Expected Return Date -->
            <div class="form-group">
                <label for="expected_return">Expected Return Date</label><br>
                <input type="date" name="expected_return" class="form-control" id="expected_return" value="{{ old('expected_return') }}" required>
            </div>

            <!-- Return Date (Optional) -->
            <div class="form-group">
                <label for="return_date">Return Date (Optional)</label><br>
                <input type="date" name="return_date" class="form-control" id="return_date" value="{{ old('return_date') }}">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label><br>
                <select name="status" class="form-control" id="status" required>
                    <option value="issued" {{ old('status') == 'issued' ? 'selected' : '' }}>Issued</option>
                    <option value="returned" {{ old('status') == 'returned' ? 'selected' : '' }}>Returned</option>
                    <option value="overdue" {{ old('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>
            <br>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Issue Book</button>
        </form>
    </div>
  </div>
    <div id="tabs-2">
        <h1 class="text-center">Add New Book</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" class="form-control">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label><br>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label><br>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label><br>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

            <div class="mb-3">
                <label for="published_at" class="form-label">Published At</label><br>
                <input type="date" class="form-control" id="published_at" name="published_at" required>
            </div><br>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
</div>
</div>
<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
</script>
@endsection
