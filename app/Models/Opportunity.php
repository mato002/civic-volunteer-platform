<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'organization_id',
        'status', // e.g. active, closed
    ];

    // Opportunity belongs to an Organization
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // Opportunity has many registrations (volunteers signed up)
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
