@extends('layout')
@section('title', 'Scholarship Listings')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Active</p>
                <h3 class="text-2xl font-bold">{{ $total_active }}</h3>
            </div>
            <i class="fas fa-graduation-cap text-blue-200 text-3xl"></i>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Upcoming Deadlines</p>
                <h3 class="text-2xl font-bold">{{ $upcoming_count }}</h3>
            </div>
            <i class="fas fa-clock text-yellow-200 text-3xl"></i>
        </div>
    </div>
    
    @auth
    <a href="{{ route('scholarships.trash') }}" class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500 block hover:bg-red-50 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Deleted Items</p>
                <h3 class="text-2xl font-bold">{{ $trash_count }}</h3>
            </div>
            <i class="fas fa-trash text-red-200 text-3xl"></i>
        </div>
    </a>
    @else
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-gray-300">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Status</p>
                <h3 class="text-2xl font-bold text-gray-400">Guest Mode</h3>
            </div>
            <i class="fas fa-user-lock text-gray-200 text-3xl"></i>
        </div>
    </div>
    @endauth
</div>

<div class="bg-white p-4 rounded-lg shadow mb-6">
    <form action="{{ route('scholarships.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
        <div class="flex-1 relative">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, provider, or location..." 
                   class="w-full pl-10 pr-4 py-2 border rounded focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        <div class="w-full md:w-48">
            <select name="filter" onchange="this.form.submit()" class="w-full p-2 border rounded bg-white">
                <option value="">Sort By: Newest</option>
                <option value="upcoming" {{ request('filter') == 'upcoming' ? 'selected' : '' }}>Upcoming Deadline</option>
                <option value="expired" {{ request('filter') == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>
        @if(request('search') || request('filter'))
            <a href="{{ route('scholarships.index') }}" class="px-4 py-2 text-gray-600 hover:text-red-500 flex items-center justify-center">
                Clear
            </a>
        @endif
    </form>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($scholarships as $s)
    <div class="bg-white flex flex-col rounded-lg shadow-sm hover:shadow-md transition border border-gray-100">
        <div class="p-5 flex-1">
            <div class="flex justify-between items-start mb-2">
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $s->provider }}</span>
                @if($s->deadline->isPast())
                    <span class="text-red-500 text-xs font-bold"><i class="fas fa-exclamation-circle"></i> Expired</span>
                @else
                    <span class="text-green-600 text-xs font-bold">{{ $s->deadline->diffForHumans() }}</span>
                @endif
            </div>
            
            <h2 class="text-lg font-bold text-gray-800 mb-1">{{ $s->name }}</h2>
            <p class="text-gray-500 text-sm mb-3"><i class="fas fa-map-marker-alt mr-1"></i> {{ $s->location }}</p>
            
            <div class="text-2xl font-bold text-green-600 mb-2">{{ $s->amount }}</div>
            <p class="text-gray-600 text-sm line-clamp-2">{{ $s->requirements }}</p>
        </div>
        
        <div class="bg-gray-50 p-4 border-t flex justify-between items-center rounded-b-lg">
            <span class="text-xs text-gray-500">Due: {{ $s->deadline->format('M d, Y') }}</span>
            <div class="flex space-x-3">
                @auth
                    <a href="{{ route('scholarships.edit', $s->id) }}" class="text-yellow-600 hover:text-yellow-700" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('scholarships.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Move to trash?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @else
                    <span class="text-gray-400 text-xs" title="Login to manage">
                        <i class="fas fa-lock"></i> Read Only
                    </span>
                @endauth
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-3 text-center py-10 text-gray-500">
        <i class="fas fa-folder-open text-4xl mb-3 block opacity-30"></i>
        No scholarships found.
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $scholarships->appends(request()->query())->links() }} 
</div>
@endsection