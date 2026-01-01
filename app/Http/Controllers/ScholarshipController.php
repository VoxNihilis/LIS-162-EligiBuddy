<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(Request $request)
    {
        $query = Scholarship::query();

        // 1. Search Logic (Name, Provider, or Location)
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('provider', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // 2. Filter/Sort Logic
        if ($request->input('filter') == 'upcoming') {
            $query->where('deadline', '>=', now())
                  ->orderBy('deadline', 'asc');
        } elseif ($request->input('filter') == 'expired') {
            $query->where('deadline', '<', now());
        } else {
            // Default: Newest created first
            $query->latest();
        }

        $scholarships = $query->paginate(9); // Pagination added
        
        // Dashboard Stats
        $total_active = Scholarship::count();
        $upcoming_count = Scholarship::where('deadline', '>=', now())->count();
        $trash_count = Scholarship::onlyTrashed()->count();

        return view('scholarships.index', compact('scholarships', 'total_active', 'upcoming_count', 'trash_count'));
    }

    // View Trashed Items
    public function trash()
    {
        $scholarships = Scholarship::onlyTrashed()->latest()->get();
        return view('scholarships.trash', compact('scholarships'));
    }

    // Restore a deleted item
    public function restore($id)
    {
        $scholarship = Scholarship::onlyTrashed()->findOrFail($id);
        $scholarship->restore();

        return redirect()->route('scholarships.trash')
                         ->with('success', 'Scholarship restored successfully.');
    }

    // ... (Keep create, store, edit, update from previous step) ...
    
    public function create() { return view('scholarships.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200', 'location' => 'required|max:200',
            'provider' => 'required|max:200', 'amount' => 'required|max:200',
            'deadline' => 'required|date', 'requirements' => 'required|max:255',
            'contact_details' => 'required|max:200',
        ]);
        Scholarship::create($request->all());
        return redirect()->route('scholarships.index')->with('success', 'Created successfully.');
    }

    public function edit(Scholarship $scholarship) { return view('scholarships.edit', compact('scholarship')); }

    public function update(Request $request, Scholarship $scholarship)
    {
        $request->validate([
            'name' => 'required|max:200', 'location' => 'required|max:200',
            'provider' => 'required|max:200', 'amount' => 'required|max:200',
            'deadline' => 'required|date', 'requirements' => 'required|max:255',
            'contact_details' => 'required|max:200',
        ]);
        $scholarship->update($request->all());
        return redirect()->route('scholarships.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        return redirect()->route('scholarships.index')->with('success', 'Moved to trash.');
    }
}