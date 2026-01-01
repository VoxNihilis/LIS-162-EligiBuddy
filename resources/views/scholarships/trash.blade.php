@extends('layout')
@section('title', 'Trash Bin')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b flex justify-between items-center bg-gray-50">
        <h3 class="font-bold text-gray-700">Deleted Scholarships</h3>
        <a href="{{ route('scholarships.index') }}" class="text-sm text-blue-500 hover:underline">&larr; Back to Dashboard</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deleted At</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($scholarships as $s)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $s->name }}</div>
                    <div class="text-sm text-gray-500">{{ $s->provider }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $s->deleted_at->diffForHumans() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <form action="{{ route('scholarships.restore', $s->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-green-600 hover:text-green-900 bg-green-100 px-3 py-1 rounded transition">
                            <i class="fas fa-undo mr-1"></i> Restore
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-10 text-center text-gray-500">
                    Trash is empty.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection