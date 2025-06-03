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
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class);
    }

    public function registrations()
    {
        return $this->hasMany(\App\Models\Registration::class);
    }
}
