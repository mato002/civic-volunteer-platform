<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'opportunity_id',
        'status',  // e.g. pending, approved, rejected
    ];

    // Registration belongs to Volunteer (User)
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    // Registration belongs to an Opportunity
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
