<!-- resources/views/child.blade.php -->
 
@extends('layouts.sidebar')
 
@section('title', 'Page Title')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
</x-slot>


@section('content')
    <p>This is my body content.</p>
@endsection