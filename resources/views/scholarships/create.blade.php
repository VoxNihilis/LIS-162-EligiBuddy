@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Add New Scholarship</h2>
    
    <form action="{{ route('scholarships.store') }}" method="POST">
        @csrf
        @include('scholarships.form')
        
        <button type="submit" class="mt-6 w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Save Scholarship</button>
        <a href="{{ route('scholarships.index') }}" class="block text-center mt-4 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
@endsection