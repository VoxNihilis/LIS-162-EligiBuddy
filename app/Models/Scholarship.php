<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'provider',
        'amount',
        'deadline',
        'requirements',
        'contact_details'
    ];

    // Cast deadline to a Carbon date instance
    protected $casts = [
        'deadline' => 'date',
    ];
}
