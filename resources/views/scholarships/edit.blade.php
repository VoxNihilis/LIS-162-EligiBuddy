@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Scholarship</h2>
    
    <form action="{{ route('scholarships.update', $scholarship->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('scholarships.form')
        
        <button type="submit" class="mt-6 w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Update Scholarship</button>
        <a href="{{ route('scholarships.index') }}" class="block text-center mt-4 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
@endsection