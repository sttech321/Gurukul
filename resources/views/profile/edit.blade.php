@extends('layouts.admin.sidebar') 

@section('content')
<div class="profilePageWrap">
    <div class="secHeadingTitle">
        <h3 class="secTitle">
            {{ __('Users') }}
        </h3>
    </div>
    <div class="profilePageContent">
        <div class="profileBox">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="profileBox">
            @include('profile.partials.update-password-form')
        </div>
        <!-- Optional: Uncomment if delete form is needed -->
        <!-- <div class="profileBox">
            @include('profile.partials.delete-user-form')
        </div> -->
    </div>
</div>
@endsection
