<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\Route;

// Public: Everyone can view the list
Route::get('/', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships', [ScholarshipController::class, 'index']); 

// Protected: Only logged-in users can Create, Edit, Delete, Restore
Route::middleware('auth')->group(function () {
    
    // Resource routes EXCEPT index (which is public above)
    Route::resource('scholarships', ScholarshipController::class)->except(['index', 'show']);

    // Trash & Restore
    Route::get('scholarships/trash/list', [ScholarshipController::class, 'trash'])->name('scholarships.trash');
    Route::post('scholarships/{id}/restore', [ScholarshipController::class, 'restore'])->name('scholarships.restore');

    // Profile (Default Breeze routes)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';